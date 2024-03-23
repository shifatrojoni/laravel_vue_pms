@extends('admin.layouts.app')

@section('title')
Sales Transactions
@endsection

@push('css')
<style>
    .display-payment {
        font-size: 5em;
        text-align: center;
        height: 100px;
    }

    .display-amount {
        padding: 10px;
        background: #f0f0f0;
    }

    .sales-table tbody tr:last-child {
        display: none;
    }

    @media(max-width: 768px) {
        .display-payment {
            font-size: 3em;
            height: 70px;
            padding-top: 5px;
        }
    }
</style>
@endpush

@section('breadcrumb')
    @parent
    <li class="active">Sales Transactions</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body">
                    
                <form class="product-form">
                    @csrf
                    <div class="form-group row">
                        <label for="product_code" class="col-lg-2">Product Code</label>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <input type="hidden" name="sales_id" id="sales_id" value="">
                                <input type="hidden" name="product_id" id="product_id">
                                <input type="text" class="form-control" name="product_code" id="product_code">
                                <span class="input-group-btn">
                                    <button onclick="showProduct()" class="btn btn-success btn-flat" type="button"><i class="fa fa-search-plus"></i>Search</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>

                <table class="table table-stiped table-bordered sales-table">
                    <thead>
                        <th width="5%">#</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th width="15%">Quantity</th>
                        <th>Discount</th>
                        <th>Subtotal</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="display-payment bg-primary"></div>
                        <div class="display-amount"></div>
                    </div>
                    <div class="col-lg-4">
                        <form action="" class="sales-form" method="post">
                            @csrf
                            <input type="hidden" name="sales_id" value="">
                            <input type="hidden" name="total" id="total">
                            <input type="hidden" name="total_item" id="total_item">
                            <input type="hidden" name="payment" id="payment">
                            <input type="hidden" name="member_id" id="member_id" value="">

                            <div class="form-group row">
                                <label for="total_amount" class="col-lg-2 control-label">Total</label>
                                <div class="col-lg-8">
                                    <input type="text" id="total_amount" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="member_code" class="col-lg-2 control-label">Member</label>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="member_code" value="">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success btn-flat" type="button"><i class="fa fa-search-plus"></i>Search</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="discount" class="col-lg-2 control-label">Discount</label>
                                <div class="col-lg-8">
                                    <input type="number" name="discount" id="discount" class="form-control" 
                                        value="" 
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="payment" class="col-lg-2 control-label">Pay</label>
                                <div class="col-lg-8">
                                    <input type="text" id="payment_amount" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="received" class="col-lg-2 control-label">Received</label>
                                <div class="col-lg-8">
                                    <input type="number" id="received" class="form-control" name="received" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="change" class="col-lg-2 control-label">Change</label>
                                <div class="col-lg-8">
                                    <input type="text" id="change" name="change" class="form-control" value="0" readonly>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-success btn-sm btn-flat pull-right btn-save"><i class="fa fa-floppy-o"></i> Save Transaction</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    let table, table2;

    $(function () {
        $('body').addClass('sidebar-collapse');

        table = $('.sales-table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'product_code'},
                {data: 'product_name'},
                {data: 'selling_price'},
                {data: 'quantity'},
                {data: 'discount'},
                {data: 'subtotal'},
                {data: 'actions', searchable: false, sortable: false},
            ],
            dom: 'Brt',
            bSort: false,
            paginate: false
        })
        .on('draw.dt', function () {
            loadForm($('#discount').val());
            setTimeout(() => {
                $('#received').trigger('input');
            }, 300);
        });
        table2 = $('.product-table').DataTable();

        $(document).on('input', '.quantity', function () {
            let id = $(this).data('id');
            let quantity = parseInt($(this).val());

            if (quantity < 1) {
                $(this).val(1);
                alert('The quantity cannot be less than 1');
                return;
            }
            if (quantity > 10000) {
                $(this).val(10000);
                alert('The quantity cannot exceed 10000');
                return;
            }

            $.post({{ url('/transaksi') }}/${id}, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'put',
                    'jumlah': quantity
                })
                .done(response => {
                    $(this).on('mouseout', function () {
                        table.ajax.reload(() => loadForm($('#discount').val()));
                    });
                })
                .fail(errors => {
                    alert('Unable to save data');
                    return;
                });
        });

        $(document).on('input', '#discount', function () {
            if ($(this).val() == "") {
                $(this).val(0).select();
            }

            loadForm($(this).val());
        });

        $('#received').on('input', function () {
            if ($(this).val() == "") {
                $(this).val(0).select();
            }

            loadForm($('#discount').val(), $(this).val());
        }).focus(function () {
            $(this).select();
        });

        $('.btn-save').on('click', function () {
            $('.sales-form').submit();
        });
    });

    function showProduct() {
        $('#product-modal').modal('show');
    }

    function hideProduct() {
        $('#product-modal').modal('hide');
    }

    function selectProduct(id, code) {
        $('#product_id').val(id);
        $('#product_code').val(code);
        hideProduct();
        addProduct();
    }

    function addProduct() {
        $.post('', $('.product-form').serialize())
            .done(response => {
                $('#product_code').focus();
                table.ajax.reload(() => loadForm($('#discount').val()));
            })
            .fail(errors => {
                alert('Unable to save data');
                return;
            });
    }

    function showMember() {
        $('#member-modal').modal('show');
    }

    function selectMember(id, code) {
        $('#member_id').val(id);
        $('#member_code').val(code);
        $('#discount').val('');
        loadForm($('#discount').val());
        $('#received').val(0).focus().select();
        hideMember();
    }

    function hideMember() {
        $('#member-modal').modal('hide');
    }

    function deleteData(url) {
        if (confirm('Are you sure you want to delete selected data?')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload(() => loadForm($('#discount').val()));
                })
                .fail((errors) => {
                    alert('Unable to delete data');
                    return;
                });
        }
    }

    function loadForm(discount = 0, received = 0) {
        $('#total').val($('.total').text());
        $('#total_item').val($('.total_item').text());

        $.get({{ url('/transaksi/loadform') }}/${discount}/${$('.total').text()}/${received})
            .done(response => {
                $('#total_amount').val('$ '+ response.total_amount);
                $('#payment_amount').val('$ '+ response.payment_amount);
                $('#payment').val(response.payment);
                $('.display-payment').text('Pay: $ '+ response.payment_amount);
                $('.display-amount').text(response.amount_in_words);

                $('#change').val('$'+ response.change_amount);
                if ($('#received').val() != 0) {
                    $('.display-payment').text('Return: $ '+ response.change_amount);
                    $('.display-amount').text(response.change_in_words);
                }
            })
            .fail(errors => {
                alert('Unable to display data');
                return;
            })
    }
</script>
@endpush
