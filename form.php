    <?php


    // checking if form was completed
    if (isset($_POST['submit'])) {
        $info = array(
            "name" => $_POST["name"],
            "age" => $_POST['age'],
            "nationality" => $_POST['nationality'],
            "gender" => $_POST['gender'],
            "phone" => $_POST['phone'],
            "email" => $_POST['email'],
            "skype" => $_POST['skype']
        );


    }

    ?>


    <form action="index.php" method="post">
        <input type="text" name="name" placeholder="Name"><br>
        <input type="date" name="age" placeholder="Birthday"><br>
        <input type="text" name="nationality" placeholder="Nationality"><br>
        <input list="Genders" name="gender" placeholder="Gender">
        <datalist id="Genders">
            <option value="Male">
            <option value="Female">
        </datalist>
        <br>
        <input type="number" name="phone" placeholder="Phone"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="text" name="skype" placeholder="Skype"><br>
        <input type="submit" name="submit">
    </form>