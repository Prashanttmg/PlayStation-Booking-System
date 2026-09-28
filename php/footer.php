<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
    footer{
        background:#222;
        color:white;
        text-align:center;
        padding:10px 0;
    }
    footer h2{
        font-size:14px;
        font-weight:400;
        color:#b8b1a0;
        margin-bottom:0px;
    }
    .social-icons{
        display:flex;
        justify-content:center;
        gap:12px;
        margin-top:0px;
    }
    .social-icons a{
        width:32px;
        height:32px;
        display:flex;
        justify-content:center;
        align-items:center;
        color:white;
        border:2px solid #c9a84c;
        border-radius:50%;
        font-size:14px;
        transition:0.3s;
    }
    .social-icons a:hover{
        background:#ffd700;
        color:black;
        transform:translateY(-2px);
    }
</style>

<footer>
    <h2>&copy; <?php echo date('Y'); ?> Namuz PlayStation. All Rights Reserved.</h2>
    <div class="social-icons">
        <a href="https://www.facebook.com" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.instagram.com" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>
        <a href="https://www.tiktok.com" target="_blank" rel="noopener"><i class="fab fa-tiktok"></i></a>
    </div>
</footer>