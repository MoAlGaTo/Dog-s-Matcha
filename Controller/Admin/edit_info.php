<?php

$email_exist_message_alert = null;
$username_exist_message_alert = null;

$lastname_message_alert = null;
$firstname_message_alert = null;
$username_message_alert = null;
$email_message_alert = null;


$lastname = null;
$firstname = null;
$username = null;
$email = null;


$failure_message = null;

$checked_alert = null;
$photo_profile_alert = null;
$gender_alert = null;
$orientation_alert = null;
$dog_name_alert = null;
$age_alert = null;
$breed_alert = null;
$address_alert = null;
$city_alert = null;
$state_alert = null;
$zip_alert = null;
$presentation_alert = null;
$empty_alert = null;
$invalid_address = null;


$gender = null;
$orientation =  null;
$dog_name = null;
$age = null;
$breed = null;
$address = null;
$city = null;
$state = null;
$zip = null;
$presentation = null;

$joueur = null;
$energique = null;
$gourmand = null;
$calineur = null;
$protecteur = null;
$obeissant = null;
$paresseux = null;
$casanier = null;

$tag_array = array();

$age_option = [1,2,3,4,5,6,7,8,9,10,11,12,24,36,48,60,72,84,96,108,120,132,144,156,168,180,192,204,216,228,240];

$dogs_breed = 
[
    "affenpinscher" => "Affenpinscher", "african" => "Africain", "airedale" => "Airedale Terrier", "akita" => "Akita Inu", 
    "appenzeller" => "Bouvier de l’Appenzell", "australian" => "Berger australien", "basenji" => "Asenji", "beagle" => "Beagle",
    "bluetick" => "Bluetick coonhound", "borzoi" => "Barzoï", "bouvier" => "Bouvier des Flandres", "boxer" => "Boxer",
    "brabancon" => "Petit brabançon", "briard" => "Berger de Brie", "buhund" => "Buhund norvégien", "bulldog" => "Bouledogue",
    "bullterrier" => "Bull Terrier", "cairn" => "Cairn terrier", "cattledog" => "Bouvier australien", "chihuahua" => "Chihuahua",
    "chow" => "Chow-chow", "clumber" => "Clumber Spaniel", "cockapoo" => "Cockapoo", "collie" => "Colley à poil long",
    "coonhound" => "Coonhound", "corgi" => "Welsh Corgi Pembroke", "cotondetulear" => "Coton de Tuléar", "dachshund" => "Teckel",
    "dalmatian" => "Dalmatien", "dane" => "Dogue allemand", "deerhound" => "Deerhound", "dhole" => "Dhole", "dingo" => "Dingo",
    "doberman" => "Dobermann", "elkhound" => "Chien d'élan norvégien gris", "entlebucher" => "Bouvier de l'Entlebuch",
    "eskimo" => "Esquimau américain", "finnish" => "Chien finnois de Laponie", "frise" => "Bichon à poil frisé", 
    "germanshepherd" => "Berger allemand", "greyhound" => "Lévrier greyhound", "groenendael" => "Berger belge Groenendael",
    "havanese" => "Bichon havanais", "hound" => "Basset hound", "husky" => "Husky de Sibérie", "keeshond" => "Spitz Loup",
    "kelpie" => "Australian Kelpie", "komondor" => "Komondor", "kuvasz" => "Kuvasz", "labrador" => "Labrador retriever",
    "leonberg" => "Leonberg", "lhasa" => "Lhassa Apso", "malamute" => "Malamute de l'Alaska", "malinois" => "Malinois",
    "maltese" => "Bichon maltais", "mastiff" => "Mastiff", "mexicanhairless" => "Nu Mexicain", "mix" => "Croisé",
    "mountain" => "Bouvier bernois", "newfoundland" => "Terre-neuve", "otterhound" => "Loutre", "ovcharka" => "Berger du Caucase",
    "papillon" => "Epagneul nain continental papillon", "pekinese" => "Pékinois", "pembroke" => "Welsh Corgi Pembroke",
    "pinscher" => "Pinscher nain", "pitbull" => "Pitbull", "pointer" => "Pointer anglais", "pomeranian" => "Spitz nain",
    "poodle" => "Caniche", "pug" => "Carlin", "puggle" => "Puggle", "pyrenees" => "Chien de montagne des Pyrénées",
    "redbone" => "Redbone Coonhound", "retriever" => "Retriever", "ridgeback" => "Rhodesian ridgeback",
    "rottweiler" => "Rottweiler", "saluki" => "Lévrier persan", "samoyed" => "Samoyède", "schipperke" => "Schipperke",
    "schnauzer" => "Schnauzer nain", "setter" => "Setter Llewellin", "sheepdog" => "Bobtail", "shiba" => "Shiba",
    "shihtzu" => "Shih tzu", "spaniel" => "Cocker spaniel anglais", "springer" => "Springer anglais", "stbernard" => "Saint-Bernard", 
    "terrier" => "Terrier", "vizsla" => "Vizsla", "waterdog" => "Chien d'eau portugais", "weimaraner" => "Braque de Weimar",
    "whippet" => "Lévrier whippet", "wolfhound" => "Irish wolfhound"
];

asort($dogs_breed);



if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if (isset($_POST['edit_button']))
    {
        $lastname_verif = "/^[^!@#$%^&*(),.;?\":{}\[\]|<>0-9\t]{1,40}$/";
        $firstname_verif = "/^[^!@#$%^&*(),.;?\":{}\[\]|<>0-9\t]{1,40}$/";
        $username_verif = "/^.{1,50}$/";
        $email_verif = "/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/i";
        $password_verif = "/^.{6,50}$/";
        


        if (!empty($_FILES['profile-picture']['name'])) {
            $profile_picture = $_FILES['profile-picture'];
            if ($profile_picture['error'] != 0) {
                if ($profile_picture['error'] == 1) {
                    $photo_profile_alert = 'le fichier est trop volumineux (max: 40 Mo).';
                } else {
                    $photo_profile_alert = 'Un problème s\'est produit avec le fichier et n\'a pu être pris en compte.';
                }
            }
        }



        if (isset($_POST['lastname'])) $lastname = htmlspecialchars($_POST['lastname']);
        if (isset($_POST['firstname'])) $firstname = htmlspecialchars($_POST['firstname']);
        if (isset($_POST['username'])) $username = htmlspecialchars($_POST['username']);
        if (isset($_POST['email'])) $email = htmlspecialchars($_POST['email']);

        if (isset($_POST['gender'])) $gender = htmlspecialchars($_POST['gender']);
        if (isset($_POST['orientation'])) $orientation =  htmlspecialchars($_POST['orientation']);
        if (isset($_POST['dog_name'])) $dog_name = htmlspecialchars($_POST['dog_name']);
        if (isset($_POST['age'])) $age = htmlspecialchars($_POST['age']);
        if (isset($_POST['breed'])) $breed = htmlspecialchars($_POST['breed']);
        if (isset($_POST['address'])) $address = htmlspecialchars($_POST['address']);
        if (isset($_POST['city'])) $city = htmlspecialchars($_POST['city']);
        if (isset($_POST['state'])) $state = htmlspecialchars($_POST['state']);
        if (isset($_POST['zip'])) $zip = htmlspecialchars($_POST['zip']);
        if (isset($_POST['presentation'])) $presentation = htmlspecialchars($_POST['presentation']);



        if (!empty($_POST['joueur']) && $_POST['joueur'] == 'joueur') {
            $joueur = htmlspecialchars($_POST['joueur']);
            array_push($tag_array, $joueur);
        }
        if (!empty($_POST['energique']) && $_POST['energique'] == 'energique') {
            $energique = htmlspecialchars($_POST['energique']);
            array_push($tag_array, $energique);
        }
        if (!empty($_POST['gourmand']) && $_POST['gourmand'] == 'gourmand') {
            $gourmand = htmlspecialchars($_POST['gourmand']);
            array_push($tag_array, $gourmand);
        }
        if (!empty($_POST['calineur']) && $_POST['calineur'] == 'calineur') {
            $calineur = htmlspecialchars($_POST['calineur']);
            array_push($tag_array, $calineur);
        }
        if (!empty($_POST['protecteur']) && $_POST['protecteur'] == 'protecteur') {
            $protecteur = htmlspecialchars($_POST['protecteur']);
            array_push($tag_array, $protecteur);
        }
        if (!empty($_POST['obeissant']) && $_POST['obeissant'] == 'obeissant') {
            $obeissant = htmlspecialchars($_POST['obeissant']);
            array_push($tag_array, $obeissant);
        }
        if (!empty($_POST['paresseux']) && $_POST['paresseux'] == 'paresseux') {
            $paresseux = htmlspecialchars($_POST['paresseux']);
            array_push($tag_array, $paresseux);
        }
        if (!empty($_POST['casanier']) && $_POST['casanier'] == 'casanier') {
            $casanier = htmlspecialchars($_POST['casanier']);
            array_push($tag_array, $casanier);
        }


        if (!$tag_array || sizeof($tag_array) !== 3) $checked_alert = 'Veuillez choisir trois hashtags.';



        if (!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['username']) && !empty($_POST['email']) && is_null($photo_profile_alert) && !empty($gender) && !empty($orientation) && !empty($dog_name) && !empty($age) && !empty($breed) && !empty($address) && !empty($city) && !empty($state) && !empty($zip) && !empty($presentation) && $tag_array)
        {
            if (!empty($profile_picture))
            {
                if (!($profile_picture['type'] == 'image/png' || $profile_picture['type'] == 'image/jpeg'))
                {
                    $photo_profile_alert = "Veuillez choisir un fichier photo valide (.png, .jpg, .jpeg).";
                }
                else if (!(mime_content_type($profile_picture['tmp_name'])  === 'image/jpeg' || mime_content_type($profile_picture['tmp_name']) === 'image/png'))
                {
                    $photo_profile_alert = "Le fichier selectionné n'est pas une image";
                }
            }
            if (!preg_match($lastname_verif, $lastname))
            {
                $lastname_message_alert = "Le champ \"Nom\" doit contenir 1 caractère minimum et 40 caractères maximum et ne doit pas contenir de caractères spéciaux.";
            }
            if (!preg_match($firstname_verif, $firstname))
            {
                $firstname_message_alert = "Le champ \"Prénom\" doit contenir 1 caractère minimum et 40 caractères maximum et ne doit pas contenir de caractères spéciaux.";
            }
            if (!preg_match($username_verif, $username))
            {
                $username_message_alert = "Votre nom d'utilisateur doit contenir 1 caractère minimum et 50 caractères maximum.";
            }
            if (!preg_match($email_verif, $email))
            {
                $email_message_alert = "Format de l'adresse e-mail invalide.";
            }
            if ($username !== $_SESSION['username'])
            {
                if (check_username($username))
                {
                    $username_exist_message_alert = "Le nom d'utilisateur existe déjà";
                }
            }
            if ($email !== $_SESSION['email'])
            {
                if (check_email($email))
                {
                    $email_exist_message_alert = "L'adresse e-mail existe déjà";
                }
            }
            if ($gender !== "male" && $gender != "female")
            {
                $gender_alert = "Veuillez choisir un sexe valide.";
            }
            if (!($orientation == "same_breed" || $orientation == "other_breed" || $orientation == "all_breed"))
            {
                $orientation_alert = "Veuillez choisir une orientation valide.";
            }
            if (!(strlen($dog_name) >= 1 && strlen($dog_name) <= 40))
            {
                $dog_name_alert = "Le nom du chien doit contenir 1 caractère minimum et 40 caractères maximum.";
            }
            if (!(in_array($age, $age_option)))
            {
                $age_alert = "Veuillez indiquer un age valide.";
            }
            if (!(array_key_exists($breed, $dogs_breed)))
            {
                $breed_alert = "Veuillez indiquer une race valide.";
            }
            if (!(strlen($address) >= 1 && strlen($address) <= 255))
            {
                $address_alert = "Veuillez indiquer une adresse valide.";
            }
            if (!(strlen($city) >= 1 && strlen($city) <= 255))
            {
                $city_alert = "Veuillez indiquer une ville valide.";
            }
            if ($state !== "france")
            {
                $state_alert = "Seule la France est un pays valide.";
            }
            if (!is_numeric($zip))
            {
                $zip_alert = "Veuillez indiquer un code postal valide.";
            }
            if (!(strlen($presentation) >= 1 && strlen($presentation) <= 255))
            {
                $presentation_alert = "Veuillez renseigner votre profil (maximum 255 caractères).";
            }
            $position = get_location_ln_la($address, $city, $zip, $state);
            if ($position === -1) {
                $invalid_address = "<div class=\"alert alert-danger alert-dismissible fade show\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>ERREUR ! L'authentification de l'adresse postale n'a pas pu se faire.</div>";
            } else  if ($position) {
                $latitude = $position[0]['lat'];
                $longitude = $position[0]['lon'];
            } else {
                $invalid_address = "<div class=\"alert alert-danger alert-dismissible fade show\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>l'adresse renseignée n'existe pas ou est introuvable.</div>";
            }
            if (empty($lastname_message_alert) && empty($firstname_message_alert) && empty($username_message_alert) && empty($email_message_alert) && empty($email_exist_message_alert) && empty($username_exist_message_alert) && empty($checked_alert) && empty($photo_profile_alert) && empty($gender_alert) && empty($orientation_alert) && empty($dog_name_alert) && empty($age_alert) && empty($breed_alert) && empty($address_alert) && empty($city_alert) && empty($state_alert) && empty($zip_alert) && empty($presentation_alert) && empty($invalid_address))
            {
                if (!empty($profile_picture))
                {
                    $picture_extension = explode('.', $profile_picture['name']);
                    $picture_extension = strtolower(end($picture_extension));
                    $picture_new_name = $_SESSION['id_user'].".".$picture_extension;
                    $picture_destination = "Profiles_Pictures/".$picture_new_name;     
                    move_uploaded_file($profile_picture['tmp_name'], $picture_destination);
                    if (!preg_match('#'.$_SESSION['profile_picture_path'].'#', $picture_destination)) {
                        unlink($_SESSION['profile_picture_path']);
                    }
                }
                else
                {
                    $picture_destination = $_SESSION['profile_picture_path'];
                }


                if (update_information_user($_SESSION['id_user'], $lastname, $firstname, $username, $email, $picture_destination, $gender, $orientation, $age, $address, $city, $state, $zip, $presentation, $latitude, $longitude))
                {
                    if (delete_user_tags($_SESSION['id_user']))
                    {
                        $response_tag = true;
                        foreach($tag_array as $tag){
                            if (!add_tag($_SESSION['id_user'], $tag)){
                                $response_tag = false;
                            }
                        }

                        if ($response_tag)
                        {
                            $_SESSION['success_message'] =  "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Vos informations ont bien été mises à jour.</div>";


                            $_SESSION['lastname'] = $lastname;
                            $_SESSION['firstname'] = $firstname;
                            $_SESSION['username'] = $username;
                            $_SESSION['email'] = $email;
                            $_SESSION['gender'] = $gender;
                            $_SESSION['orientation'] = $orientation;
                            $_SESSION['dog_name'] = $dog_name;
                            $_SESSION['age'] = $age;
                            $_SESSION['breed'] = $breed;
                            $_SESSION['address'] = $address;
                            $_SESSION['city'] = $city;
                            $_SESSION['country'] = $state;
                            $_SESSION['zipcode'] = $zip;
                            $_SESSION['biography'] = $presentation;
                            $_SESSION['latitude'] = $latitude;
                            $_SESSION['longitude'] = $longitude;
                            $_SESSION['profile_picture_path'] = $picture_destination;


                            header('location: http://localhost:8080/Dog-s-Matcha/online.php?page=user_profil');
                            exit;
                        }
                    }
                    else
                    {
                        $failure_message = "<div class=\"alert alert-danger alert-dismissible fade show\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Échec de la mise à jour de vos informations.</div>";
                    }
                }
                else
                {
                    $failure_message = "<div class=\"alert alert-danger alert-dismissible fade show\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Échec de la mise à jour de vos informations.</div>";
                }
            } 
        }
        else
        {
            $failure_message = "<div class=\"alert alert-danger alert-dismissible fade show\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>Tous les champs doivent être remplis.</div>";
        }
    }
}


?>