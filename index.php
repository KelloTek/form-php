<?php $title = "Form - Home"; include_once "components/header.php"; ?>
    <h1>Form Example</h1>
    <div>
        <?php if(isset($_GET["status"]) && in_array($_GET["status"], (array)"ok")): ?>
            <p>Votre message à été envoyer avec succès.</p>
        <?php elseif(isset($_GET["status"]) && in_array($_GET["status"], (array)"no")): ?>
            <p>Votre message n'a pas été envoyer. Veuilliez réessayer plus tard.</p>
        <?php endif; ?>
        <form action="form_treatment.php" method="post">
            <label for="name">Nom Prénom</label>
            <input id="name" name="name" type="text" placeholder="e.g John Doe" required>

            <label for="email">Adresse email</label>
            <input id="email" name="email" type="email" placeholder="e.g contact@example.com" required>

            <label for="phone">Téléphone</label>
            <input type="tel" name="phone" id="phone" placeholder="Numéro de téléphone" pattern="[0-9]{10}" title="Veuillez entrer un numéro de téléphone valide (10 chiffres)" required>

            <label for="subject">Sujet</label>
            <input type="text" name="subject" id="subject" placeholder="Sujet" required>

            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" placeholder="Entrez votre message" required></textarea>

            <button type="submit">Submit</button>
        </form>
    </div>
<?php include_once "components/footer.php"; ?>