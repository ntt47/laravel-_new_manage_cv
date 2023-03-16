@extends('layout_employer')
<style>
    .component {
        position: relative;
        width: 30%;
        margin: 5rem auto;
        padding: 1rem;

        box-shadow: 2px 2px 10px #207dff;
        background-color: #FFFFFF;

        text-align: center;
    }

    .credit-card h2 {
        color: rgba(4, 99, 128, 1);
    }

    .component .credit-card form {
        display: flex;
        flex-direction: column;
    }

    .component .credit-card .line {
        display: flex;
    }

    .component .credit-card .line input {
        width: 20%;
        /* on définit une taille plus petite qu'il le faut, le flex-grow fera le reste */
        flex: 1;
        margin: 0.4rem 0.3rem;
    }

    input {
        border: none;
        border-bottom: 1px solid rgba(0, 0, 0, .12);
        margin: 1rem 0;
        padding: 4px;
        font-size: 1rem;
        outline: none;
    }

    input::-webkit-input-placeholder {
        color: #AAAAAA;
    }

    .valid-button {
        border: 0;
        padding: 1rem 2rem;
        background-color: #207dff;
        color: #EFECCA;
        font-weight: bold;
        margin-top: 2rem;
        box-shadow: 1px 1px 1px black;
    }

    .valid-button:hover {
        background-color: rgba(4, 99, 128, 1);
        box-shadow: none;
    }

    .total {
        position: absolute;
        top: 3em;
        left: -8em;
        z-index: -1;

        background: #002F2F;
        color: #A7A37E;

        width: 100px;
        transform: rotate(-35deg);
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding-right: 2rem;

        box-shadow: 1px 1px 5px black;
    }

    .total p {
        font-size: 1.5rem;
    }
</style>
@section('content')
    <div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start">
                <div class="col-md-12 ftco-animate text-center mb-5">
                    <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Canditates</span></p>
                    <h1 class="mb-3 bread">Hire Your Best Candidates</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-candidates ftco-candidates-2 bg-light">
        <div class="container">
            <div class="row">
                <section class="component">
                    <div class="total">
                        <h3>TOTAL</h3>
                        <p>187,00 €</p>
                    </div>
                    <div class="credit-card">
                        <h2>Credit card</h2>
                        <form action="{{ route('employer.updateRechare') }}" method="POST">
                            @csrf
                            <br>
                            <div>
                                <p>Your money: {{ number_format($totalMoney, 2, '.', ',') }}</p>
                            </div>
                            <div class="line">
                                <input class="litle" type="text" placeholder="Your Name" name="user_name" />
                            </div>
                            @error('user_name')
                                <p style="color:red">* {{ $message }} </p>
                            @enderror
                            <div class="line">
                                <input class="tall" type="text" placeholder="Fill Money" name="money"
                                    id="moneyInput" />
                            </div>
                            @error('money')
                                <p style="color:red">* {{ $message }} </p>
                            @enderror
                            <button type="submit" class="valid-button">Deposit Confirmation</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </section>
    
    <script>
        const moneyInput = document.getElementById("moneyInput");

        moneyInput.addEventListener("input", function(e) {
            // Lấy giá trị trong ô input
            let inputVal = e.target.value;

            // Xóa khoảng trắng và chuyển đổi giá trị sang kiểu số
            inputVal = inputVal.replace(/\s/g, "");

            // Kiểm tra nếu giá trị là một số hợp lệ
            if (!isNaN(numberVal)) {
                // Định dạng giá trị kiểu tiền tệ USD
                let usdVal = new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'USD',
                    minimumFractionDigits: 2
                }).format(numberVal);

                // Cập nhật giá trị trong ô input
                e.target.value = usdVal;
            }
        });
    </script>
@endsection
