<?php   
if (isset($_POST['submit'])) {
  //On a bien fait un sumit pour créer un compte
  //On vérifie que l'adresse mail n'est pas utilisé
  $isLoginUsed = $bdd->query('SELECT count(id) as count from users WHERE email = "'.$_POST['email'].'"')->fetch()['count'];
    if ($isLoginUsed == 0) {
    //Le login n'est pas utilisé, on peut faire la création de compte
      if ($_POST['password'] == $_POST['confirmez']) {
        //On créer le nouveau compte (toutes les informations ont saisies car de type required)

        //On a mis l'adresse de facturation a jours\\
          $address_one = $_POST['Address_1'];
          $address_two = $_POST['Address_2'];
          $country = $_POST['pays'];
          $postal_code = $_POST['post_code'];
          $city = $_POST['ville'];
          $human_name = $_POST['prenom']/*+' '+$_POST['nom']*/;

          $sql_1 = "INSERT  INTO user_addresses (human_name,address_one,address_two,postal_code,city,country)
          VALUES ('".$human_name."','".$address_one."','".$address_two."','".$postal_code."','".$city."','".$country."')" ;
          $bdd->query($sql_1);            
        //On a mis a jour l'adresse de livraison identique à celle de facturation\\
          $sql_2 = "INSERT  INTO order_addresses (human_name,address_one,address_two,postal_code,city,country)
          VALUES ('".$human_name."','".$address_one."','".$address_two."','".$postal_code."','".$city."','".$country."')" ;
          $req_1=$bdd->query($sql_2); 

          //On a mis à jour la table user\\
          $first_name = $_POST['prenom'];
          $last_name = $_POST['nom'];
          $email = $_POST['email'];
          $phone_number = $_POST['Telephone'];
          $password = $_POST['password'];
          //On récupère l'id de l'adresse de facturation
          $billing_id = $bdd->prepare('SELECT id FROM user_addresses WHERE human_name=? and address_one=? and address_two=? and postal_code=? and city=? and country=?');
          $billing_id->execute(array($human_name,$address_one,$address_two,$postal_code,$city,$country));
          $billing_adress_id = $billing_id->fetch()['id'];
          //On récupère l'id de l'adresse de livraison
          $delivery_id = $bdd->prepare('SELECT id FROM order_addresses WHERE human_name=? and address_one=? and address_two=? and postal_code=? and city=? and country=?');
          $delivery_id->execute(array($human_name,$address_one,$address_two,$postal_code,$city,$country));
          $delivery_adress_id = $delivery_id->fetch()['id'];
          $sql = "INSERT INTO users (last_name, first_name, email, phone_Number, password, billing_adress_id, delivery_adress_id ) VALUES ('".$last_name."','".$first_name."','".$email."','".$phone_number."','".$password."','".$billing_adress_id."','".$delivery_adress_id."')" ;
          $bdd->query($sql); 
          $page='main';    
        }
        else {
          //Mot de passe différent!
          $page='createAccount';
          $err='Mot de passe invalide';
        }
      }
      else {
        $page='createAccount';
        $err='Login déjà utilisé';
      }    
  } else {
    $page='createAccount';
    $err='Formulaire non soumis';
  }
    
?>