<style>
    * {
        box-sizing: border-box;
    }

    html {
        height: 100%;
    }

    body {
        align-items: center;
        background: #F4F6F8;
        display: flex;
        font-family: 'Rubik', sans-serif;
        font-size: 12px;
        justify-content: center;
        margin: 0;
        min-height: 100%;
        padding: 1.5em;
    }

    h5 {
        font-family: 'Segoe UI', 'Tahoma', 'Geneva', 'Verdana', 'sans-serif';
        font-size: 24px;
    }

    a {
        cursor: pointer;
    }

    .card {
        width: 500px;
        max-width: 800px;
        background-color: #FFF;
        padding: 40px;
    }

    .py {
        padding: 0px 24px;
    }
</style>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Congratulations Registration</h5>
        <p class="card-text">Dear {{ $data['name'] }},<br>
            I am reaching out to thank you for registering to us. <br>
            Please! kindly use your email and this generate password to submit application form.
        </p>
        <br>
        <p>Here your password: <strong>{{ $data['password'] }}</strong></p>
        <p>Link to submit the form:
            <a href="http://localhost:8000/login">
                <span>Subscription Form</span>
            </a>
        </p>
        <br>
        <p>Best wishes,
            <br>SBI Royal Securities Plc
            <br>Brokerage Team
        </p>

        <p>
            Phone:
            <a href="tel:6031112298">(+855)23 996 973/23 996 973</a>
        </p>
        <address>Adress: 13Ath Floor, Phnom Penh Tower, No. 445, Preah Monivong Blvd,
            Sangkat Boeung Pralit, Khan 7Makara, Phnom Penh, Cambodia
        </address>
        <p>
            Email:
            <a href="mailto:brokerage@sbiroyal.com.kh"> brokerage@sbiroyal.com.kh</a> |
            <a href="mailto:brokerage@sbiroyal.com">brokerage@sbiroyal.com</a> |
            <a href="mailto:www.sbiroyal.com.kh">www.sbiroyal.com.kh</a>
        </p>
        <br>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTE3AbV0jDJimdNIBvUYMIsssTkXpZ6oZ5HBlJ9E5j0&s"
                alt="Cinque Terre" height="50">
    </div>
</div>