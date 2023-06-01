<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TAI | Komentarze</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
    <style>
        body {
            background-color: #e8e8e8;
        }

        .title {
            text-align: center;
            background-color: transparent
        }

        .table-container {
            background-color: white;
            max-width: 900px;
            margin: 0 auto;
        }

        .box {
            display: flex;
            justify-content: center;
        }

        .box-footer {
            float: right;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')
    <div class="table-container">
        <div class="title">
            <h3>Księga komentarzy</h3>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="box box-primary ">
           
            <form role="form" action="{{ route('store') }}" id="order-form" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="box">
                    <div class="box-body">
                        <div class="form-group{{ $errors->has('message')?'has-error':'' }}" id="roles_box">
                        <fieldset>
                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="ciastoSelect">Ciasto:</label>
                            <div class="col-md-4">
                                <select id="ciastoSelect" name="ciastoSelect" class="form-control">
                                    <option value="cienkie">Cienkie</option>
                                    <option value="grube">Grube</option>
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="miesoSelect">Mięso:</label>
                            <div class="col-md-4">
                                <select id="miesoSelect" name="miesoSelect" class="form-control">
                                    <option value="kurczak">Kurczak</option>
                                    <option value="baranina">Baranina</option>
                                    <option value="mieszane">Mieszane</option>
                                </select>
                            </div>
                        </div>

                        <!-- Multiple Checkboxes -->
                        <div class="form-group needs-validation">
                            Sosy:
                            <div class="col-md-4">
                                <div class="checkbox">
                                    <label for="sauceCheckbox-0">
                                        <input type="checkbox" class="sauceCheckbox" name="sauceCheckbox" id="sauceCheckbox-0" value="czosnek">
                                        Czosnkowy
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="sauceCheckbox-1">
                                        <input type="checkbox" class="sauceCheckbox" name="sauceCheckbox" id="sauceCheckbox-1" value="ostry">
                                        Ostry
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label for="sauceCheckbox-2">
                                        <input type="checkbox" class="sauceCheckbox" name="sauceCheckbox" id="sauceCheckbox-2" value="ketchup">
                                        Ketchup
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Multiple Radios (inline) -->
                        <div class="form-group needs-validation">
                            Sposób zapłaty:
                            <div class="col-md-4">
                                <label class="radio-inline" for="paymentRadio-0">
                                    <input type="radio" class="paymentRadio" name="paymentRadio" id="paymentRadio-0" value="blik" checked="checked">
                                    Blik
                                </label>
                                <label class="radio-inline" for="paymentRadio-1">
                                    <input type="radio" class="paymentRadio" name="paymentRadio" id="paymentRadio-1" value="karta">
                                    Karta
                                </label>
                                <label class="radio-inline" for="paymentRadio-2">
                                    <input type="radio" class="paymentRadio" name="paymentRadio" id="paymentRadio-2" value="gotowka">
                                    Gotówka
                                </label>
                            </div>
                        </div>

                        <!-- Textarea -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="uwagiText">Uwagi:</label>
                            <div class="col-md-4">
                                <textarea class="form-control" id="uwagiText" name="uwagiText">Dodatkowe uwagi</textarea>
                            </div>
                        </div>

                    </fieldset>
                        </div>
                    </div>
                </div>
                <div class="box-footer"><button type="submit" class="btn btn-success">Utwórz</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>