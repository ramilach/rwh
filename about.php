<!DOCTYPE html>
<html lang="en">
<head>
    <title>about</title>
    <!--fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caprasimo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&display=swap" rel="stylesheet">
    <!--fontawesome css-->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!--boostrap css-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--custom css-->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .orange {
            color: #ff8f00;
        }
    </style>
</head>
<body>

       <!-- Navigation Bar -->
       <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="#" style="font-family: Caprasimo; color: #ff8f00;">RWH</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/source-code/index.php">الصفحة الرئيسية <span class="sr-only">(الحالي)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/source-code/services.php">الخدمات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/source-code/about.php">حول</a>
            </li>
        </ul>
    </div>
    <a href="login.php" class="btn btn-outline-dark my-2 my-sm-0 mx-2" type="button">تسجيل الدخول</a>
    
    <a href="signup.php" class="btn btn-outline-warning my-2 my-sm-0" type="button" style="background-color: #ff8f00;">التسجيل</a>
</nav>

    
    <div class="container">
    <h1 class="text-center mt-5" style="font-family: Protest Strike;">عنّا</h1>
</div>

   
    <div id="section1" class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="assets/img/abouts1.png" alt="صورة القسم 1" class="img-fluid">
            </div>
            <div class="col-md-8">
                <h2>مرحبًا بكم في <span class="orange">مركز العمل عن بُعد</span></h2>
                <p>مرحبًا بكم في مركز العمل عن بُعد، حيث نسعى لخلق فرص واتصالات في عالم العمل.
                    مهمتنا هي تمكين الأفراد للعثور على توظيف معنوي وتوفير حلول فعّالة للشركات.
                    بتركيزنا على الابتكار والتعاون، نهدف إلى تحقيق تأثير إيجابي على كل من الباحثين عن عمل
                    وأصحاب العمل. انضموا إلينا في هذه الرحلة حيث نجتاز معًا مستقبل العمل.</p>
            </div>
        </div>
    </div>
</div>

    
    <div class="container">
    <h1 class="text-center mt-5"><i class="fas fa-bullseye orange"></i> مهمتنا</h1>
</div>

    
    <div id="section2" class="about-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2>مهمتنا هي جعلك تجد العمل وتحصل على الفرص...</h2>
                <p>في <span class="orange">مركز العمل عن بُعد</span>، نحن ملتزمون بمساعدتك في اكتشاف فرص
                    عمل مثيرة والنمو في رحلتك المهنية. نحن ندرك أهمية ربط الأفراد الموهوبين بالأدوار ذات
                    المعنى، ومهمتنا هي أن نكون شريكك الموثوق به في هذا السعي. بالإضافة إلى ذلك، نحن ملتزمون
                    بتبسيط العملية للمشترين، مما يوفر لهم الوقت الثمين ويضمن تجربة سلسة. انضموا إلينا في
                    مهمتنا لخلق مسار أكثر كفاءة ومكافأة لكل من الباحثين عن عمل وأصحاب العمل.</p>
            </div>
            <div class="col-md-4">
                <img src="assets/img/abouts2.png" alt="صورة القسم 2" class="img-fluid">
            </div>
        </div>
    </div>
</div>

    
    <div class="container mt-5">
    <div class="row">
            
            <div class="col-md-6">
            <div class="text-center">
                <h2><i class="fas fa-users orange"></i> انضموا إلى مجتمعنا</h2>
                <a href="signup.php" class="btn btn-outline-warning my-2 my-sm-0" type="button"
                    style="background-color: #ff8f00;">ابدأ الآن!</a>
            </div>
        </div>
            
            <div class="col-md-6">
            <div class="text-center">
                <h2><i class="fas fa-question-circle orange"></i> المساعدة/الردود</h2>
                <form method="post" action="feedback.php">
                    <div class="form-group">
                        <input type="email" class="form-control" id="emailInput" name="email"
                            placeholder="أدخل البريد الإلكتروني">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="messageInput" name="message" rows="3"
                            placeholder="أدخل رسالتك"></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning btn-submit">إرسال</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!--bootstrap js-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--js-->
    <script src="assets/js/main.js"></script>

</body>
</html>
