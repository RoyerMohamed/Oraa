function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#user_thumnail_img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#user_thumnail").change(function () {
    readURL(this);
});

tinymce.init({
    selector: '#test'
});
// Livewire.emit('postAdded')


// $(function () {
//     $( "#boardcontents" ).sortable({
//       items: "div#task",
//       cursor: 'move',
//       opacity: 0.6,
//       update: function(e) {
//           updatePostOrder();
//       }
//     });
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('input[type="hidden"]').attr('value')
//         }
//     });

//     function updatePostOrder() {
//         var order = [];
//         var _token = $('input[type="hidden"]').attr('value');
//         $('div#task').each(function(index, element) {
//             order.push({
//                 id: $(this).attr('data-id'),
//                 order: index
//             });
//         });
       
//         console.log( order);
//       $.ajax({
//         type: "POST",
//         dataType: "json",
//         url: "tache/update-order",
//         data: {
//           order: order,
//           _token
//         },
//         success: function(response) {
           
//             if (response.status == "success") {
//               console.log(response);
//             } else {
//               console.log(response);
//             }
//         }
//       });
//     }
//   });