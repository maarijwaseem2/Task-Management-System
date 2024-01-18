<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.navbar {
    overflow: hidden;
    position: sticky;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 16px;
    background-color: transparent;
}

.navbar a {
  font-weight: 700;
    font-size: 18px;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    color: white;
}

.navbar a:hover {
    background-color: #ddd;
    color: black;
    border-radius: 20px;
}

.navbar .active {
    font-size: 50px;
    font-weight: 700;
}

.navbar .active small {
    font-size: 30px;
    color: blueviolet;
}

.navbar .icon {
    display: none;
}

.home {
    background-image: url("./bg.jpeg");
    background-size: cover;
    height: 100vh;
}

.home .text {
    width: 30%;
    height: calc(100vh - 60px);
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 10px;   
}

.home .text div {
    width: 80%;
}

.home .text h1 {
    font-size: 50px;
    font-weight: 900;
}

.home .text span {
    font-weight: 300;
}

.about-sec {
    padding: 30px 0;
}

.about-sec h1 {
    text-align: center;
    margin-bottom: 20px;
}

.about-sec div {
    display: flex;
    align-items: center;
    justify-content: space-evenly;
}

.about-sec div .img {
    width: 40%;
}

.about-sec div .img img {
    width: 100%;
}

.about-sec .text {
    width: 50%;
    line-height: 20px;
    text-align: justify;
}

@media screen and (max-width: 600px) {
    .navbar a:not(:first-child) {
        display: none;
    }

    .navbar a.icon {
        float: right;
        display: block;
    }
}

@media screen and (max-width: 600px) {
    .navbar.responsive {
        position: relative;
    }

    .navbar.responsive a.icon {
        position: absolute;
        right: 0;
        top: 0;
    }

    .navbar.responsive a {
        float: none;
        display: block;
        text-align: left;
    }
}
    </style>
</head>
<body>
    <div class="home">
        <div class="navbar" id="myNavbar">
            <div class="active">T<small>ask</small> M<small>anagment</small> S<small>ystem</small></div>
            <div>
                <a href="index.php">Home</a>
                <a href="#">About</a>
                <a href="user_login.php">User Login</a>
                <a href="register.php">User Registration</a>
                <a href="admin/admin_login.php">Admin Login</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    &#9776;
                </a>
            </div>
        </div>
        <div class="text">
            <div>
                <h1>Project <span>managers tools</span></h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, perspiciatis excepturi, cum error
                    veniam
                    esse corrupti deleniti quam unde eos iste maxime eaque recusandae molestiae atque. Quo natus enim
                    veniam.</p>
            </div>
        </div>
    </div>

    <div class="about-sec">
        <h1>ABOUT TASK MANAGEMENT</h1>
        <div>
            <div class="img">
                <img src="./background.jpg" alt="">
            </div>
            <div class="text">
                <p>Welcome to Task Management Website, where productivity meets simplicity. Our journey began
                    with a shared passion for efficiency and a belief that managing tasks should be a seamless
                    experience. Tired of complicated systems and cluttered interfaces, we set out to create a task
                    management solution that is intuitive, powerful, and tailored to the needs of individuals and teams
                    alike.

                    At Task Management Website, we understand the challenges of balancing work, personal life,
                    and everything in between. Our mission is to empower you with a tool that not only helps you
                    organize your tasks but also enhances your overall productivity. Whether you're a professional
                    aiming to streamline your workflow or a team collaborating on projects, our platform provides the
                    features you need without unnecessary complexity.

                    What sets us apart is our commitment to user-centric design and continuous improvement. We value
                    your feedback and actively incorporate it into the evolution of our platform. The result is a task
                    management solution that adapts to your needs, grows with you, and remains a reliable companion on
                    your journey to success.

                    Join us at Task Management Website and experience the difference. Let's transform the way you
                    work and bring efficiency to every task. Thank you for being a part of our story.</p>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("myNavbar");
            if (x.className === "navbar") {
                x.className += " responsive";
            } else {
                x.className = "navbar";
            }
        }
    </script>
</body>
</html>