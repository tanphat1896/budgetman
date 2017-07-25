/**
 * Created by Administrator on 25/7/2017.
 */
$(function () {
    // console.log(baseUrl + "?m=item&a=list");
    getItemData(baseUrl + "?m=item&a=list");

   $('#btn-add-item').click(function (e) {
       e.preventDefault();
       $('#add-item-div').slideToggle(200, function () {
           updateDivHeight();
       });

   });

   $('#btn-hide-item').click(function (e) {
       e.preventDefault();
       $('#add-item-div').slideUp(200, function () {
           updateDivHeight();
       });
   });

   $('#frm-add-item').submit(function (e) {
       e.preventDefault();
       var name = $('#add-item-name').val();
       var price = $('#add-item-price').val();
       if (name.trim() === ''){
           alert("Hãy điền tên");
           return false;
       }
       addNewItem(name, price);
   });
});

function updateItemList(rs) {
    var html = '';
    html += "<table class='table'>";
    html += "<thead><tr><th>STT</th><th>Tên mục chi</th><th>Giá tiền</th><th>Xóa</th></tr></thead>";
    html += "<tbody class='text-left'>";
    $.each(rs.itemList, function (i, item) {
        html += "<tr>";
        html += "<td>" + ++rs.start + "</td>";
        html += "<td>" + item.name + "</td>";
        html += "<td>" + item.price + "</td>";
        html +=
            "<td>" +
                "<form  method='post' class='frm-item-del'>" +
                    "<input type='hidden' name='id' value='" + item.id + "'>" +
                    "<button class='btn btn-danger btn-sm' type='submit'>x</button>" +
                "</form>" +
            "</td>";
        html += "</tr>";
    });
    html += "</tbody></table>";
    html += "<div class='row text-center' id='item-pagination'>";
    html += rs.pagination + "</div>";
    $('#item-list').html(html);

}

function addItemActionAfter() {
    updateDivHeight();
    $('[data-toggle="tooltip"]').tooltip();

    $('.pagination a').click(function (e) {
        e.preventDefault();
        getItemData(this.href);
    });

    $('.frm-item-del').submit(function (e) {
        e.preventDefault();
        if (confirm("Xác nhận Xóa???")){
            var id = $(this).find('[name="id"]').attr('value');
            $.ajax({
                url: baseUrl + "?m=item&a=del",
                type: "post",
                dataType: "json",
                data: {
                    id: id
                },
                success: function (rs) {
                    if (rs.hasOwnProperty('fail')){
                        if (parseInt(rs.fail) === 0){
                            var currentPage = parseInt($('#item-pagination .active span').text());
                            if (isNaN(currentPage))
                                currentPage = 1;
                            getItemData(baseUrl + "?m=item&a=list&p=" + currentPage);
                        }
                        else
                            alert(rs.msg);
                    }
                }
            });
        }
    });
}

function getItemData(url){
    // console.log("cal me");
    $.get(
        url,
        {},
        function (rs) {
            updateItemList(rs);
        },
        'json'
    ).always(function () {
        addItemActionAfter();
    });
}

function addNewItem(name, price) {
    $.ajax({
        url: baseUrl + "?m=item&a=add",
        type: "post",
        dataType: "json",
        data: {
            name: name,
            price: price
        },
        success: function (rs) {
            if (rs.hasOwnProperty('fail') && rs.fail === "1")
                alert("Thêm thất bại");
        }
    }).always(function () {
        getItemData(baseUrl + "?m=item&a=list");
        $('#add-item-name').val('');
        $('#add-item-price').val('1000');
    });
}