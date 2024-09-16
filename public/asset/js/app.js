
function adjustDivHeight() {
    const div1Height = document.querySelector('.navbar').offsetHeight;
    const windowHeight = window.innerHeight;
    const div2 = document.querySelector('.content');

    div2.style.height = (windowHeight - div1Height) + 'px';
}

window.addEventListener('resize', adjustDivHeight);
window.addEventListener('load', adjustDivHeight);

// function adjustDivWidth() {
//     const div1Width = document.querySelector('.box_sidebar').offsetWidth;
//     const windowWidth = window.innerWidth;
//     const div2 = document.querySelector('.box_content');

//     div2.style.width = (windowWidth - div1Width) + 'px';
// }

// window.addEventListener('resize', adjustDivWidth);
// window.addEventListener('load', adjustDivWidth);




// feature

let btn_add_feature = $('#btn_add_feature');
let box_feature = $('.box_feature');

if(btn_add_feature != null && box_feature != null){

    const loadBtnDeleteItemFeature = () => {
        $('.btn_delete_feature').on('click', function () {
            let item_feature = $(this).closest('.input-group').closest('.item_feature')[0];
            item_feature.remove();
        })
    }

    let html_item_feature = `
    <div class="item_feature">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="feature[]">
            <button class="btn_delete_feature btn btn-danger" type="button"><i class="fa fa-times"></i></button>
        </div>
    </div>
    `;

    btn_add_feature.on('click', function () {
        box_feature.append(html_item_feature);
        loadBtnDeleteItemFeature();
    });

    loadBtnDeleteItemFeature();


}


new DataTable('#table_seven', {
    pageLength: 7,
    lengthMenu: [7, 5, 10, 15, 20],
    order: [[0, 'desc']],
    language: {
        "emptyTable": "Không có dữ liệu trong bảng",
        "lengthMenu": "Hiển thị _MENU_ mục",
        "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
        "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
        "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
        "infoFiltered": "(được lọc từ tổng số _MAX_ mục)",
        "search": "Tìm kiếm:",
        // "paginate": {
        //     "first": "Đầu",
        //     "last": "Cuối",
        //     "next": "Tiếp",
        //     "previous": "Trước"
        // },
        "columnDefs": [
            { "searchable": true, "targets": [0, 1, 2, 3] }, // Tìm kiếm trong cột 1 và cột 3
            { "searchable": false, "targets": [4] } // Không tìm kiếm trong cột 2
        ],
        "pagingType": "simple_numbers",
    }
});


new DataTable('#table_five', {
    pageLength: 5,
    lengthMenu: [5, 10, 15, 20],
    order: [[0, 'desc']],
    language: {
        "emptyTable": "Không có dữ liệu trong bảng",
        "lengthMenu": "Hiển thị _MENU_ mục",
        "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
        "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
        "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
        "infoFiltered": "(được lọc từ tổng số _MAX_ mục)",
        "search": "Tìm kiếm:",
        // "paginate": {
        //     "first": "Đầu",
        //     "last": "Cuối",
        //     "next": "Tiếp",
        //     "previous": "Trước"
        // },
        "columnDefs": [
            { "searchable": true, "targets": [0, 1, 2, 3] }, // Tìm kiếm trong cột 1 và cột 3
            { "searchable": false, "targets": [4] } // Không tìm kiếm trong cột 2
        ],
        "pagingType": "simple_numbers",
    }
});
