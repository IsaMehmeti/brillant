<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Fatura {{$sale->id}} - {{$sale->customer_name}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-sm   ">
            Fatura
            <small class="page-info">
                ID: #{{$sale->id}}
            </small>
        </h1>

    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <img src="{{asset('/img/logo.jpg')}}" width="100" height="100">
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Klienti:</span>
                            <span class="text-600 text-sm text-blue align-middle">{{$sale->customer_name}}</span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1 text-sm">
                                {{$sale->customer_address}}
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-sm text-600 text-125">
                                Fatura
                            </div>

                            <div class="my-2 text-sm"><i class="fa fa-circle text-blue-m2 mr-1"></i> <span class="text-600 text-90 text-sm">ID: #{{$sale->id}}</div>

                            <div class="my-2 text-sm"><i class="fa fa-circle text-blue-m2 mr-1"></i> <span class="text-600 text-90 text-sm">Data e shitjes:</span> {{$sale->sale_date}}</div>

                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    <div class="row text-600 text-xsm text-white bgc-default-tp1 py-25">
                        <div class="d-none d-sm-block col-1">#</div>
                        <div class="col-9 col-sm-5">Materiali</div>
                        <div class="d-none d-sm-block col-4 col-sm-2">Sasia</div>
                        <div class="d-none d-sm-block col-sm-2">Qmimi njesi</div>
                        <div class="col-2">Shuma</div>
                    </div>
                    <?php $i = 1;?>
                    @foreach ($sale->materials as $material)
                    <div class="text-95 text-xsm">
                        <div class="row mb-2 mb-sm-0 py-25">
                            <div class="d-none d-sm-block col-1">{{$i}}</div>
                            <div class="col-9 col-sm-5">{{$material->material_title}} - {{$material->material_category}}</div>
                            <div class="d-none d-sm-block col-2">{{$material->quantity}}{{$material->unit}}</div>
                            <div class="d-none d-sm-block col-2 text-95">{{$material->unit_price}}eur</div>
                            <div class="col-2 text-secondary-d2">${{$material->amount}}eur</div>
                        </div>
                        <hr>
                    @endforeach
                    </div>

                    <div class="row border-b-2 brc-default-l2"></div>

                    <!-- or use a table instead -->
                    <!--
            <div class="table-responsive">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th class="opacity-2">#</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th width="140">Amount</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        <tr></tr>
                        <tr>
                            <td>1</td>
                            <td>Domain registration</td>
                            <td>2</td>
                            <td class="text-95">$10</td>
                            <td class="text-secondary-d2">$20</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            -->

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">



                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-sm text-right">
                                    Shuma Totale
                                </div>
                                <div class="col-5 text-xsm">
                                    <span class="text-150 text-success-d3 opacity-2">{{$sale->total_amount}}eur</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                </div>
            </div>
        </div>
    </div>
</div>


<style type="text/css">
body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.text-sm{
 font-size:30px;
}
.text-xsm{
 font-size:20px;
}
.text-md{
 font-size:50px;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #000000 !important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(0, 0, 0, 0.92) !important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #000000 !important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #000000 !important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}
</style>

<script type="text/javascript">
    window.onafterprint = window.close;
     window.print();
</script>
</body>
</html>
