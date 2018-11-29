<div id="createAccount">

  <!-- Header -->
                          
             <section class="col">
               <hr class="ligne">
                   <center> <h1>Create an account</h1> </center>
               <hr class="ligne">      
              
               <?php
               if (isset($err)) { ?>
                <p><center><div id="err"><h3><?php echo $err ?></h3></div></center></p>
               <?php } ?>


                <form method="POST"  action="index.php">
                <input type="hidden" name="page" value="addAccount">
                  <center>
                      <table>
                        <tr class="input">
                          <td align="center">
                            <label>Last name<span class="required"> </span></label>
                             <br>
                            <input type="text"  name="nom"  class="nom-prenom">
                          </td>
                          <td align="center">
                            
                          </td >
                          <td align="center">
                            <label >First name<span class="required"> </span> </label>
                             <br>
                            <input type="text" name="prenom" class="nom-prenom">
                          </td>  
                        </tr>
                      </table>
                  </center>    
                      <center>
                          <div class="input">
                            <label>E-mail<span class="required"><!--Impossible de valider le formulaire si vide!--> </span></label>
                            <br>
                            <input type="email"   name="email"  class="input-text" required>
                          </div>

                          <div class="input">
                            <label>Phone<span ></span></label>
                            <br>
                            <input type="number"  name="Telephone"  class="input-text">
                          </div> 

                          <div class="input">
                            <label>Country<span ></span></label>
                            <br>
                            <select name="pays" class="input-text">
                               <option > France</option>
                               <option > Cameroun </option>
                               <option > Allemagne </option>
                               <option > Italie </option>
                               <option > Colombie </option>
                               <option > Argentine </option>
                               <option > Espagne </option>
                               <option > Senegal </option>        
                            </select>
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

                      <center>
                          <table>
                            <tr class="input">
                              <td align="center">
                                <label>Address One<span class="required"> </span></label>
                                 <br>
                                <input type="text"  name="Address_1"  class="ville_postal">
                              </td>
                              <td align="center">
                                
                              </td >
                              <td align="center">
                                <label for="prenom">Address Two<span class="required"> </span> </label>
                                 <br>
                                <input type="text" name="Address_2" class="ville_postal">
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
                           <input type="submit" class="btn-success" name="submit" value="submit" />
                           <input type="reset" class="cancel" value="Cancel"/></a>
                          </p>
                      </center>     
                </form>
                <form method="POST" action="index.php">
                  <input type="submit" class="cancel" value="Back Home!">
                </form>          
            </section>
  </div>