/**
 * Created by Administrator on 24/7/2017.
 */
$(function () {
    getDetailData(baseUrl + "?m=detail&a=list");

    // bật tắt div tìm kiếm
    $('#btn-search').click(function () {
        $('#search-div').slideToggle(200);
        $('#add-detail-div').slideUp(0);
    });

    // bật tắt div thêm
    $('#btn-add').click(function () {
        $('#add-detail-div').slideToggle(200, function () {
            updateDivHeight();
        });
        $('#search-div').slideUp(0);
    });

    // nút ẩn div thêm
    $('#btn-hide-detail').click(function () {
        $('#add-detail-div').slideUp(200, function () {
            updateDivHeight();
        });
        return false;
    });

    // hiện/tắt mục chọn item
    $('#btn-choose-item').click(function (e) {
        e.preventDefault();
        var ch = $('#item-chosen-list');
        if (!$(ch).is(':visible')){
            getItemList();
        }
        $(ch).fadeToggle(50);
    });

    // cập nhật lại danh sách item
    $('#link-refresh-chosen-list').click(function (e) {
        e.preventDefault();
        getItemList();
    });

    // thêm mục detail
    $('#frm-add-detail').submit(function () {
        addNewDetail();
        return false;
    });
});

function updateDetailList(rs){
    var html = '';
    html += "<table class='table'>";
    html += "<thead><tr><th>Ngày</th><th>Mục chi</th><th>Buổi</th><th>Số lượng</th><th>Tổng</th><th>Xóa</th></tr></thead>";
    html += "<tbody class='text-left'>";
    $.each(rs.detailList, function (i, item) {
        var date = item.date.split('-');
        html += "<tr>";
        html += "<td>" + date[2] + "-" + date[1] + "-" + date[0] + "</td>";
        html += "<td>" + item.name + "</td>";
        html += "<td>" + getPeriod(parseInt(item.period)) + "</td>";
        html += "<td>" + item.amount + "</td>";
        html += "<td>" + calcTotalCost(item.amount, item.price) + "</td>";
        html +=
            "<td>" +
                "<form  method='post' class='frm-det-del'>" +
                    "<input type='hidden' name='id' value='" + item.id + "'>" +
                    "<button class='btn btn-danger btn-sm' type='submit'>x</button>" +
                "</form>" +
            "</td>";
        html += "</tr>";
    });
    html += "</tbody></table>";
    html += "<div class='row text-center' id='detail-pagination'>";
    html += rs.pagination + "</div>";
    $('#detail-list').html(html);
}

/**
 * Sau khi append phần tử mới các action này mới có tác dụng
 */
function addActionAfter() {
    updateDivHeight();
    $('.pagination a').click(function (e) {
        e.preventDefault();
        getDetailData(this.href);
    });

    $('[data-toggle="tooltip"]').tooltip();

    $('.frm-det-del').submit(function (e) {
        e.preventDefault();
        if (confirm("Xác nhận Xóa???")){
            var id = $(this).find('[name="id"]').attr('value');
            // console.log(id);
            $.ajax({
                url: baseUrl + "?m=detail&a=del",
                type: "post",
                dataType: "json",
                data: {
                    id: id
                },
                success: function (rs) {
                    if (rs.hasOwnProperty('fail') && parseInt(rs.fail) === 0){
                        // console.log($('#detail-pagination .active span').text());
                        var currentPage = parseInt($('#detail-pagination .active span').text());
                        if (isNaN(currentPage))
                            currentPage = 1;
                        getDetailData(baseUrl + "?m=detail&a=list&p=" + currentPage);
                    }
                }
            });
        }
    });
}

function getDetailData(url){
    $.get(
        url,
        {},
        function (rs) {
            updateDetailList(rs);
        },
        'json'
    ).always(function () {
        addActionAfter();
    });
}

function updateChosenList(rs){
    var html = '';
    $.each(rs, function (i, item) {
        html += "<option value='" + item.id + "'>" + item.name + "</option>";
    });
    $('.select-item-list').html(html);

    // chọn item sẽ đổ vào textbox
    $('.select-item-list option').on('click', function () {
        $('[name="detail-item-name"]').val($(this).text().trim());
        $('[name="detail-item-id"]').val($(this).val());
        // console.log($('[name="detail-item-id"]').val());
    });
}

function getItemList(){
    $.get(
        baseUrl + "?m=item&a=list&p=-1",
        {},
        function (rs) {
            updateChosenList(rs);
        },
        'json'
    );
}

function getPeriod(period){
    var periods = ["Sáng", "Trưa", "Chiều", "Tối"];
    return periods[period-1];
}

function calcTotalCost(amount, price){
    return parseInt(amount) * parseInt(price);
}

function addNewDetail(){
    // lấy dữ liệu
    var itemId = $('[name="detail-item-id"]').val();
    if (parseInt(itemId) < 1){
        $('#detail-item-name-err').css('color', 'red');
        return false;
    }
    var date = $('[name="date-add"]').val().split('-');
    var y = date[0];
    var m = date[1];
    var d = date[2];
    var period = $('[type="radio"][name="period"]:checked').val();
    var amount = $('[name="amount"]').val();

    $.ajax({
        url: baseUrl + "?m=detail&a=add",
        type: "post",
        dataType: "text",
        data: {
            itemId: itemId,
            day: d,
            mon: m,
            year: y,
            period: period,
            amount: amount
        },
        success: function (rs) {
            console.log(rs);
            getDetailData(baseUrl + "?m=detail&a=list");
        }
    }).always(function () {
        $('#detail-item-name-err').css('color', '#fff');
        $('[name="detail-item-id"]').val('0');
        $('[name="detail-item-name"]').val('');
    });
}
