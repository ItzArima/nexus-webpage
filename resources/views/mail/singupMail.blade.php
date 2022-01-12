<style>
    a{
        text-decoration: none;
        color: black;
        padding: 0.5rem 2rem;
        border: 2px solid #df6add;
        border-radius: 10px;
        transition: all 0.3s;
        font-weight: 900;
    }

    a:hover{
        background-color: #df6add;
        color: white;
    }
</style>    

<h1>Nexuscraft</h1>
<br>
<br>
Ciao {{$email_data['name']}},
<br>
Per confermare la tua registrazione clicca su questo bottone
<br>
<a href="http://192.168.1.4:1234/verify?code={{$email_data['verification_code']}}">
    Verifica La mail
</a>