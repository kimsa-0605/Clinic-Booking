document.getElementById('submitButton').addEventListener('click', function () {
    const inputs = document.querySelectorAll('.form-control'); // Lấy tất cả input trong form
    let formValid = true;
    inputs.forEach(input => {
        if (!input.value.trim()) {
            formValid = false;

            // Thêm lớp input-error
            input.classList.add('input-error');

            // Hiển thị popover
            $(input).popover({
                trigger: 'manual', // Hiển thị thủ công
                placement: 'left' // Vị trí popover
            }).popover('show');

            // Ẩn popover sau 2 giây
            setTimeout(() => {
                $(input).popover('hide');
            }, 2000);
        } else {
            // Xóa lỗi nếu đã nhập
            input.classList.remove('input-error');
            $(input).popover('hide');
        }
    });


});
