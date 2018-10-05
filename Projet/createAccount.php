<!DOCTYPE html>
<html>
    <head>
        <!-- En-tête de la page -->
        <meta charset="iso-8859-1" />
        <title>First HTML Page</title>
        <link rel="stylesheet" type="text/css" href="css/createAccount.css" />
    </head>
<body class="contacts-index-index">


  <!-- Header -->
  
  
  <script type="text/javascript">


        function testCaps(texte)
        {
              if(texte.substr(0,1).toUpperCase()!=texte.substr(0,1))
                {
                  alert('La première lettre de votre prenom doit en majuscule')
                 document.form.prenom.value=  texte.substr(0,1).toUpperCase() + texte.substr(1,texte.length-1);
                }
        }

        function test_Tout(texte)
        {
              if(texte.substr(0).toUpperCase()!=texte.substr(0))
                {
                  alert('Votre nom doit etre en majuscule')
                 document.form.nom.value=  texte.substr(0).toUpperCase() + texte.substr(1);
                }
        }

        function verifpassword()
        {
              if(document.form.passwordd.value!=document.form.confirmez.value)
                {
                  alert('les deux mots de passe ne sont pas identiques! veuillez vérifier ')
                }
        }
  </script>
                          
             <section class="col">
               <hr class="ligne">
                   <center> <h1>Create an account</h1> </center>
               <hr class="ligne">      
              
                <form method="POST"  action="?controller=clients&action=save">
                  <center>
                      <table>
                        <tr class="input">
                          <td align="center">
                            <label>Last name<span class="required"> </span></label>
                             <br>
                            <input type="text"  name="nom" onblur="test_Tout(this.v)"  class="nom-prenom">
                          </td>
                          <td align="center">
                            
                          </td >
                          <td align="center">
                            <label >First name<span class="required"> </span> </label>
                             <br>
                            <input type="text" name="prenom"  onblur="testCaps(this.value)" class="nom-prenom">
                          </td>  
                        </tr>
                      </table>
                  </center>    
                      <center>
                          <div class="input">
                            <label>E-mail<span class="required"> </span></label>
                            <br>
                            <input type="email"   name="email"  class="input-text" required>
                          </div>

                          <div class="input">
                            <label>Phone<span ></span></label>
                            <br>
                            <input type="number"  name="Telephone"  class="input-text">
                          </div>                          

                          <div class="input">
                            <label> Address <span class="required"> </span> </label>
                            <br>
                            <input type="text" name="ville"  class="input-text">
                          </div>
                      <center>
                      <center>
                          <table>
                            <tr class="input">
                              <td align="center">
                                <label>City<span class="required"> </span></label>
                                 <br>
                                <input type="text"  name="ville"  class="ville_postal">
                              </td>
                              <td align="center">
                                
                              </td >
                              <td align="center">
                                <label for="prenom">Postal code<span class="required"> </span> </label>
                                 <br>
                                <input type="text" name="post_code" class="ville_postal">
                              </td>  
                            </tr>
                          </table>
                      </center> 
                          <div class="input">
                            <label>Password<span class="required"> </span></label>
                            <br>
                            <input type="password"  name="password" maxlength="15" class="input-text" required>
                          </div>

                          <div class="input">
                            <label for="prenom"> Confirm the password<span class="required"> </span> </label>
                            <br>
                            <input type="password"  name="confirmez"  maxlength="15" class="input-text" required>
                          </div> 

                          <p>
                           <input type="submit" onclick="window.location='?controller=clients&action=cnx" class="btn-success" value="Submit" />
                           <input type="reset" class="cancel" value="Cancel"/>
                          </p>
                      </center>     
                </form>          
            </section>
        
<body>