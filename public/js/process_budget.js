/**
 * Created by Administrator on 25/7/2017.
 */
$(function () {
    getBudgetData(baseUrl + "?m=budget&a=list");

    $('#btn-add-budget').click(function (e) {
        e.preventDefault();
        $('#add-budget-div').slideToggle(200, function () {
            updateDivHeight();
        });

    });

    $('#btn-hide-budget').click(function (e) {
        e.preventDefault();
        $('#add-budget-div').slideUp(200, function () {
            updateDivHeight();
        });
    });

    $('#frm-add-budget').submit(function (e) {
        e.preventDefault();
        var total = $('#add-budget-total').val();
        addNewBudget(total);
    });
});

function updateBudgetList(rs) {
    var html = '';
    html += "<table class='table'>";
    html += "<thead><tr><th>STT</th><th>Ngày thay đổi</th><th>Số tiền</th><th>Ghi chú</th><th>Xóa</th></tr></thead>";
    html += "<tbody class='text-left'>";
    $.each(rs.budgetList, function (i, item) {
        html += "<tr>";
        html += "<td>" + ++rs.start + "</td>";
        html += "<td>" + item.date_add + "</td>";
        html += "<td>" + item.total + "</td>";
        html += "<td>" + item.note + "</td>";
        html +=
            "<td>" +
            "<form  method='post' class='frm-budget-del'>" +
            "<input type='hidden' name='id' value='" + item.id + "'>" +
            "<button class='btn btn-danger btn-sm' type='submit'>x</button>" +
            "</form>" +
            "</td>";
        html += "</tr>";
    });
    html += "</tbody></table>";
    html += "<div class='row text-center' id='budget-pagination'>";
    html += rs.pagination + "</div>";
    $('#budget-list').html(html);

}

function addBudgetActionAfter() {
    updateDivHeight();
    $('[data-toggle="tooltip"]').tooltip();

    $('.pagination a').click(function (e) {
        e.preventDefault();
        getBudgetData(this.href);
    });

    $('.frm-budget-del').submit(function (e) {
        e.preventDefault();
        if (confirm("Xác nhận Xóa???")){
            var id = $(this).find('[name="id"]').attr('value');
            $.ajax({
                url: baseUrl + "?m=budget&a=del",
                type: "post",
                dataType: "json",
                data: {
                    id: id
                },
                success: function (rs) {
                    if (rs.hasOwnProperty('fail')){
                        if (parseInt(rs.fail) === 0){
                            var currentPage = parseInt($('#budget-pagination .active span').text());
                            if (isNaN(currentPage))
                                currentPage = 1;
                            getBudgetData(baseUrl + "?m=budget&a=list&p=" + currentPage);
                            getRemainBudget();
                        }
                        else
                            alert(rs.msg);
                    }
                }
            });
        }
    });
}

function getBudgetData(url){
    // console.log("cal me");
    $.get(
        url,
        {},
        function (rs) {
            updateBudgetList(rs);
        },
        'json'
    ).always(function () {
        addBudgetActionAfter();
    });
}

function addNewBudget(total) {
    $.ajax({
        url: baseUrl + "?m=budget&a=add",
        type: "post",
        dataType: "json",
        data: {
            total: total
        },
        success: function (rs) {
            if (rs.hasOwnProperty('fail') && rs.fail === "1")
                alert("Thêm thất bại");
        }
    }).always(function () {
        getBudgetData(baseUrl + "?m=budget&a=list");
        getRemainBudget();
    });
}