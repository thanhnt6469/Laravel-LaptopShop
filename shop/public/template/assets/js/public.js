$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function loadMore()
{
    let page = $('#page').val();
    page = parseInt(page);
    $.ajax({
        type : 'POST',
        dataType : 'JSON',
        data : { page },
        url : '/services/load-product',
        success : function (result) {
            console.log(result);
            if (result.html !== '') {
                $('#loadProduct').append(result.html);
                $('#page').val(page + 1);
                //$('#page').val(page + result.products.length);
            } else {
                alert('Đã load xong Sản Phẩm');
                $('#button-loadMore').css('display', 'none');
            }
        }
    })
}

function applyFilter(){

    // Lấy tất cả các phần tử có class 'category' và có thuộc tính 'value' là một số
    var categoryElements = document.querySelectorAll('.category[value]');

    // Biến để lưu giá trị
    var totalValue = 0;

    // Lặp qua tất cả các phần tử thỏa mãn điều kiện và cộng giá trị vào totalValue
    categoryElements.forEach(function (element) {
        // Lấy giá trị của mỗi phần tử và chuyển đổi thành số
        var value = parseFloat(element.getAttribute('value'));

        // Kiểm tra xem giá trị có phải là số không và không phải NaN
        if (!isNaN(value)) {
            // Cộng giá trị vào totalValue
            totalValue += value;
        }
    });

    // Kiểm tra xem totalValue có giá trị hay không
    if (!isNaN(totalValue)) {
        console.log('Tổng giá trị của categories là:', totalValue);
        var category = totalValue;
    } else {
        console.log('Không tìm thấy giá trị category hoặc giá trị không phải là số.');
    }

    var minValueString = document.getElementById('slider-range-value1').innerText;
    var maxValueString = document.getElementById('slider-range-value2').innerText;
    var minValue = parseFloat(minValueString.replace('$', '').replace(',', ''));
    var maxValue = parseFloat(maxValueString.replace('$', '').replace(',', ''));

    $.ajax({
        url: '/services/filter-product',
        type : 'GET',
        data: {
            minValue: minValue,
            maxValue: maxValue,
            category: category
        },
        success: function(result) {
            console.log(result);
            if (result.html !== '') {
                $('#filterProduct').html(result.html);
            } else {
                console.log('success filter');
                $('#filterProduct').html(result.html);
            }
        },
        error: function(error) {
            console.error(error);
        }
    });
}

