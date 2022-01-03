<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Invoice Generator">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="invoice">

    <!-- Title Page-->
    <title>Invoice Generator</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins" id="implement">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Invoice Generator</h2>
                    <form method="POST" @submit.prevent="createInvoice">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Company Name</label>
                                    <input class="input--style-4" v-model="form.company_name" type="text" name="first_name">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Website</label>
                                    <input class="input--style-4" v-model="form.website" type="text" name="last_name">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Due Date</label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4" v-model="form.due_date" type="date" name="birthday">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Labour</label>
                                    <input class="input--style-4" v-model="form.labour" type="text" name="labour">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Address</label>
                                    <input class="input--style-4" v-model="form.address" type="text" name="address">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">City</label>
                                    <input class="input--style-4" v-model="form.city" type="text" name="city">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="input-group">
                                        <label class="label">Zip</label>
                                        <input class="input--style-4" v-model="form.zip" type="text" name="zip">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Street</label>
                                    <input class="input--style-4" v-model="form.st" type="text" name="st">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Parts</label>
                                    <input class="input--style-4" v-model="form.parts" type="text" name="parts">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Phone Number</label>
                                    <input class="input--style-4" v-model="form.phone_number" type="text" name="phone_number">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Service Fee</label>
                                    <input class="input--style-4" v-model="form.service_fee" type="text" name="service_fee">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Name</label>
                                    <input class="input--style-4" v-model="form.name" type="text" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label class="label">Fax</label>
                            <input class="input--style-4" v-model="form.fax" type="text" name="fax">
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">
                                <span v-if="loading">
                                    <i class="fa fa-spinner fa-spin"></i> Submiting...
                                </span>
                                <span v-else> Submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>

<script>
    const App = new Vue({
        el: "#implement",
        data: {
            error: null,
            loading: false,
            form: {
                company_name: null,
                address: null,
                city: null,
                zip: null,
                st: null,
                phone_number: null,
                fax: null,
                website: null,
                name: null,
                labour: null,
                parts: null,
                service_fee: null,
                due_date: null,
            }
        },
        methods: {
            createInvoice: function() {
                this.loading = true
                axios.post('/api/invoice', this.form)
                .then(response => {
                    this.loading = false
                    window.location.href = '/api/thank-you';
                })
                .catch(error => {
                    this.loading = false
                    swal("Oops!", "Something is wrong!", "warning");
                })
            }
        }
    })
</script>

</html>
<!-- end document-->