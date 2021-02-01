<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet">
        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script src="Demo.js"></script>
		<title>PHP AJAX (Delete Book Data)</title>
		<style>
			input::-webkit-outer-spin-button,
			input::-webkit-inner-spin-button {
				-webkit-appearance: none;
				margin: 0;
			}
			input[type=number] {
				-moz-appearance: textfield;
			}
			.i-feedback {
				width: 100%;
				margin-top: .25rem;
				font-size: .875em;
				color: #dc3545;
			}
		</style>
	</head>
<body class="container-fuild bg-dark text-light" >
    <form class="w-50 mx-auto p-3 border px-3 border-light border-2 rounded-3 bg-light text-dark " style="margin-top:7%;"  name="deleteform" onsubmit="return deleteBookData()" >
        <fieldset>
            <legend class="fs-3 fw-bold mb-5 text-center ">Delete Book Data</legend>
            <div id="data"></div>
            <div class="row">
                <div class="col-md-3">
                    <label class="form-label fs-4" for="titles">Title</label>
                </div>
                <div class="col-md-9">
                    <select class="form-select" id="titles" name="titles"  aria-label="Title select" onchange="getEditData()" required>
                        <option value=" " disabled selected>--Select Title--</option>
                    </select>
                </div>
            </div>
            <div id="editVis">
                <div class="my-4 text-center">
                    <input type="submit" class="btn btn-dark rounded-pill w-25 " name="delete" value="Delete" />
                </div>
            </div>
        </fieldset>
    </form>   
    </body>
</html>