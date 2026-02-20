<!-- Welcome Box HTML -->
<div v-if="settings.welcome_box_enabled" class="welcome-box">
    <div class="rgb-box"></div>
    <div class="welcome-text">
        Welcome, {{ auth()->user()->name }}!
    </div>
</div>

<!-- Welcome Box Styling -->
<style>
    .welcome-box {
        position: fixed;
        top: 20px;
        left: 20px;
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        padding: 20px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
    }
    .rgb-box {
        width: 20px;
        height: 20px;
        margin-right: 10px;
        background: linear-gradient(45deg, red, yellow, green, cyan, blue, magenta);
        background-size: 400% 400%;
        animation: rgbAnimation 2s infinite;
    }
    .welcome-text {
        font-size: 18px;
    }
    @keyframes rgbAnimation {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>

<!-- Show box for a few seconds using JS -->
<script>
    setTimeout(function() {
        document.querySelector(".welcome-box").style.display = "none";
    }, 5000); // Hides the box after 5 seconds
</script>
