                    <?php
                            $widthS = '<script>
                                    document.write(screen.width);
                            </script>';
                            // echo $widthS;
                            if($widthS < 840){

                            
                    ?>
            
              <div>

                <form id="searchForm">
            <input type="text" autocomplete="off" placeholder="Search.." id="searchInput" >  <button id="submitSearchInput"> <i class="fa fa-search"></i> </button>
                </form>
              </div>
              
    
      <?php
                            }else{
                               ?>
                                <div id="OverLaySearch">
                                <span href="#" style="color:red;display:none;" id="closeSearch" style="font-size:29px;">&times</span>  <br>
                              <center> <h2 style="color:gray">Search</h2> </center>
                              </div>
                  
                                <div>
                  
                                  <form id="searchForm">
                              <input type="text" autocomplete="off" placeholder="Search.." id="searchInput" >  <button id="submitSearchInput"> <i class="fa fa-search"></i> </button>
                                  </form>
                                </div>  
                                <style>
                                .OverLaySearch{
                                    position:fixed;
                                    top:0px;
                                    right:0px;
                                    left:0px;
                                    height:100vh;
                                    background:red;
                                    width:100%;
                                    
                                }
                                </style>
                               <?php
                            }

      ?>