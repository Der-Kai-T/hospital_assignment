

<div class="row">
    <div class="col-12">
        
            <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Transport anlegen</h3>

                        <div class="card-tools">
                            
                        </div>
                    </div>
                    
                    <div class="card-body" style="height: auto;">
                        <div class="row">
                            <div class="col-6">
                            
                                <div class="form-group">
                                    <label class="col-form-label" for="hospital">Krankenhaus</label><br>
                                        <select required class="form-control" name="hospital" id="hospital">
                                            <option selected disabled>--- bitte einen Eintrag auswählen ---</option>
                                            <?php
                                                $order = array();
                                                $order1['col'] = "hospital_name";
                                                $order1['dir'] = "ASC";
                                                
                                                array_push($order, $order1);
                                                
                                                $db_array = db_select("hospital", array(), $order);
                    
                                            
                                                foreach($db_array as $line){
                                                    $hospital_id    = $line['hospital_id'];
                                                    $hospital_name  = $line['hospital_name'];
                                                    echo("<option value='$hospital_id'>$hospital_name</option>\n");
                                                }


                                            ?>
                                        </select>
                                        
                                </div>
                            </div>

                            <div class="col-6">
                            <?php //TODO Update disciplines based on selected hospital ?>
                                <div class="form-group">
                                    <label class="col-form-label" for="discipline">Fachrichtung</label><br>
                                        <select required class="form-control" name="discipline" id="discipline">
                                            <option selected disabled>--- bitte einen Eintrag auswählen ---</option>
                                            <?php
                                                $order = array();
                                                $order1['col'] = "discipline_name";
                                                $order1['dir'] = "ASC";
                                                
                                                array_push($order, $order1);
                                                
                                                $db_array = db_select("discipline", array(), $order);
                    
                                            
                                                foreach($db_array as $line){
                                                    $discipline_id    = $line['discipline_id'];
                                                    $discipline_name  = $line['discipline_name'];
                                                    echo("<option value='$discipline_id'>$discipline_name</option>\n");
                                                }


                                            ?>
                                        </select>
                                        
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="col-form-label" for="transport_number">Einsatznummer</label> <br>
                                    <input type="text" name="transport_number" class="form-control" id="transport_number">
                                </div>
                            </div>
                            
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="col-form-label" for="transport_weight">Gewichtung</label> <br>
                                    <input type="number" name="transport_weight" class="form-control" id="transport_weight">
                                </div>
                            </div>  
                            
                            <div class="col-2">
                                <div class="form-group">
                                    <label class="col-form-label" for="transport_duration">Dauer (min)</label> <br>
                                    <input type="number" name="transport_duration" class="form-control" id="transport_duration">
                                </div>
                            </div>  
                            
                        </div>    

                    </div>
                    <div class="card-footer">
                        <?php
                        if(isset($javascript)){
                            echo "<button type='submit' class='btn btn-primary' onclick='transport_submit()'>Transport speichern</button>";
                        }else{
                            echo"<button type='submit' class='btn btn-primary'>Transport speichern</button>";
                        }
                        ?>
                    </div>

                    
            </div>
        
    </div>
</div>

                              