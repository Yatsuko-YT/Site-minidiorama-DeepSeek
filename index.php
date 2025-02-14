<?php
// Traitement du formulaire de contact
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    $to = "contact@minidiorama.com"; // Remplacez par votre email
    $subject = "Nouveau message de $name";
    $headers = "From: $email";
    
    if (mail($to, $subject, $message, $headers)) {
        $feedback = "Message envoyé ! Merci pour votre intérêt.";
    } else {
        $feedback = "Erreur lors de l'envoi du message.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniDiorama - Paysages Miniatures</title>
    <meta name="description" content="Créateur de mini dioramas uniques - Paysages miniatures de 10cm">
    <style>
        /* Reset CSS */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        /* Variables CSS */
        :root {
            --primary: #8B6B61;
            --secondary: #F5F5F5;
            --accent: #A88C7B;
        }

        /* Styles généraux */
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            background: #FAFAFA;
        }

        header {
            background: var(--primary);
            color: white;
            padding: 1rem;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        nav {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 2rem;
        }

        section {
            padding: 4rem 2rem;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .hero {
            text-align: center;
            margin-top: 60px;
            background: url('https://source.unsplash.com/random/1920x1080/?miniature') center/cover;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
            max-width: 1200px;
            margin: 2rem auto;
        }

        .gallery img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
            transition: transform 0.3s;
        }

        .gallery img:hover {
            transform: scale(1.05);
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            width: 100%;
        }

        input, textarea {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        footer {
            background: var(--primary);
            color: white;
            text-align: center;
            padding: 1rem;
        }

        @media (max-width: 768px) {
            .nav-links { display: none; }
            .gallery { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <h1>MiniDiorama</h1>
            <div class="nav-links">
                <a href="#home">Accueil</a>
                <a href="#about">À propos</a>
                <a href="#gallery">Galerie</a>
                <a href="#contact">Contact</a>
            </div>
        </nav>
    </header>

    <section id="home" class="hero">
        <div>
            <h2>Des Mondes Miniatures en 10cm²</h2>
            <p>Créations uniques faites main avec passion</p>
        </div>
    </section>

    <section id="about">
        <h2>Notre Passion</h2>
        <p>Depuis 2023, nous créons des mini dioramas uniques...</p>
        <!-- Ajoutez votre contenu ici -->
    </section>

    <section id="gallery">
        <h2>Nos Créations</h2>
        <div class="gallery">
            <img src="https://source.unsplash.com/random/301x300/?miniature,forest" alt="Forêt miniature">
            <img src="https://source.unsplash.com/random/302x300/?miniature,village" alt="Village miniature">
            <img src="https://source.unsplash.com/random/303x300/?miniature,fantasy" alt="Monde fantastique">
            <!-- Ajoutez vos images ici -->
        </div>
    </section>

    <section id="contact">
        <h2>Contact</h2>
        <?php if(isset($feedback)) echo "<p>$feedback</p>"; ?>
        <form method="POST">
            <input type="text" name="name" placeholder="Nom" required>
            <input type="email" name="email" placeholder="Email" required>
            <textarea name="message" placeholder="Message..." rows="5" required></textarea>
            <button type="submit">Envoyer</button>
        </form>
    </section>

    <footer>
        <p>© 2023 MiniDiorama - Tous droits réservés</p>
    </footer>

    <script>
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Validation de formulaire
        document.querySelector('form').addEventListener('submit', function(e) {
            const email = document.querySelector('[name="email"]').value;
            if (!validateEmail(email)) {
                alert('Veuillez entrer un email valide');
                e.preventDefault();
            }
        });

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
    </script>
</body>
</html>
