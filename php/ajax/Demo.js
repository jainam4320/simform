// function addEmpData() {
//     $.post("postData.php",
//     {
//         name: $('#full_name').val(),
//         email: $('#email').val(),
//         country_code: $('#country_code').val(),
//         contact_number: $('#contact_number').val(),
//         bdate: $('#bdate').val(),
//         job_title: $('#job_title').val(),
//         blood_group: $('#blood_group').val()
//     },
//     function(data, status){
//         $('#data').html(data);
//     });
//     return false;
// }

// var table = "";

// function getEmpData() {
//     $('#displayemp tfoot th').each( function () {
//         var title = $('#displayemp thead th').eq( $(this).index() ).text();
//         $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
//     });
//     var table = $('#displayemp').DataTable({
//         dom: 'Bfrtip',
//         colReorder: true,
//         rowReorder: true,
//         scrollY: 350,
//         buttons: [ 'colvis', 'copy' , 'csv', 'excel', 'pdf', 'print' ],
//         responsive: true,
//         ajax: {
//             url: 'getData.php',
//             dataSrc: ''
//         }
//     });
//     table.on( 'responsive-display', function ( e, datatable, row, showHide, update ) {console.log( 'Details for row '+row.index()+' '+(showHide ? 'shown' : 'hidden') )});
//     table.columns().eq( 0 ).each( function ( colIdx ) {
//         $( 'input', table.column( colIdx ).footer() ).on( 'keyup change', function () {
//             table.column( colIdx ).search( this.value ).draw();
//         });
//     });
// }

//Edit Data

// $(document).ready(function() {
//     $("#editVis").hide();
//     selTitle = document.getElementById("titles");
//     var titles = [];
//     $.get("getTitles.php", function(data, status) {
//         titles = JSON.parse(data);
//         for( var i=0; i<titles.length; i++) {
//             selTitle.options[selTitle.options.length] = new Option(titles[i],titles[i]);
//         }
//     });
	
// });

// function getEditData() {
//     $.post("getEditData.php",
//     {title : $("#titles").val()},
//     function(data, status){
//         detail = JSON.parse(data);
//         $("#etpages").val(detail.total_pages);
//         $("#eaname").val(detail.author_name);
//         $("#eemailadd").val(detail.author_email);
//         $("#epdate").val(detail.published_date);
//         $("#ebgenre").val(detail.genre);
//     });
// 	$("#editVis").show();
// }

// function editBookData() {
//     $.post("editData.php",
//     {
//         title: $('#titles').val(),
//         tpages: $('#etpages').val(),
//         aname: $('#eaname').val(),
//         emailadd: $('#eemailadd').val(),
//         pdate: $('#epdate').val(),
//         bgenre: $('#ebgenre').val() 
//     },
//     function(data, status){
//         $('#data').html(data);
//     });
//     return false;
// }

// //Delete Data

// function deleteBookData() {
//     $.post("deleteData.php",
//     {title : $("#titles").val()},
//     function(data, status){
//         $('#data').html(data);
//     });
//     return false;
// }