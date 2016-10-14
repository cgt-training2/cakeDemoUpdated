<div class="section1">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 one">
                <div class="background1">

                    <div class="leftP">

                        <div class="leftPUpper">

                            <h1 class="headerH1">Folko nda Gahrma, C.P.</h1>

                        </div>

                        <div class="leftPLower">    

                            <p class="lowerP"> Dsaibliiyt Rteiermnet atotrnye for fderela epmleyoes</p>

                        </div>  

                    </div>

                    <div class="rightP">

                        <div class="rightPUpper">

                            <p> Call Today for a Free Consultation. </p>

                        </div>

                        <div class="rightPLower">

                            <h1> (291)299-65 1 1 </h1>

                        </div>

                    </div>
                    
                </div><!-- background1 div -->

            </div><!-- one div -->

        </div><!-- row div -->

    </div><!-- container div -->

</div><!-- section1 div -->

<div class="section2">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 one">

                <nav class="navbar navbar-default header">

                    <div class="container-fluid">

                        <!-- Brand and toggle get grouped for better mobile display -->

                        <div class="navbar-header">

                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>

                            </button>
                                              <!--<a class="navbar-brand" href="#">Brand</a>-->
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                            <ul class="nav navbar-nav size">
                                <!--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>-->
                                <!--<li><a href="index.php">Home</a></li>
                                    <li><a href="attorneys.php">Attorneys</a></li>
                                    <li><a href="practice_area.php">Practice Areas</a></li>
                                    <li><a href="recent_cases.php">Recent cases</a></li>
                                    <li><a href="resources.php">Resources</a></li>
                                    <li><a href="contact_us.php">Contact Us</a></li>-->
                                              
                                <!--<li><a href="#Home" class="active">Home</a></li> -->
                                <!-- class="active"    ['class'=>'active'] -->

                                <!-- active class get back to first element when click on other li element cakephp -->
                                
                                   <?php  $actionName = $this->request->params['action']; ?>

                                   <li class="<?php echo (!empty($this->request->params['action']) && ($this->request->params['action']=='home') )?'active' :'inactive' ?>">

                                        <?= $this->Html->link('Home', ['controller' => 'Postsupdate','action' => 'home']) ?>

                                    </li>

                                    
                                    <li class="<?php echo (!empty($this->request->params['action']) && ($this->request->params['action']=='attorney') )?'active' :'inactive' ?>">

                                        <?php echo $this->Html->link('Attorneys', ['controller' => 'Postsupdate','action' => 'attorney']); 
                                        ?>
                                        
                                        <!-- 
                                           
                                        echo $this->Url->build(['_name' => 'post', 'slug' => 'i-m-slug']);    
                                        -->

                                    </li>

                                    <li><a href="#recent">Recent cases</a></li>

                                    <li><a href="#resources">Resources</a></li>

                                    <li class="<?php echo (!empty($this->request->params['action']) && ($this->request->params['action']=='index') )?'active' :'inactive' ?>">

                                        <?= $this->Html->link('Posts', ['controller' => 'Postsupdate','action' => 'index']) ?>   

                                    </li>

                                    <li class="<?php echo (!empty($this->request->params['action']) && ($this->request->params['action']=='contact') )?'active' :'inactive' ?>">

                                        <?= $this->Html->link('Contact Us', '/contactME') ?>       

                                    </li>

                            </ul>  


                            <?php $user = $this->request->session()->read('Auth.User'); if(!empty($user)): ?>

                                <div class="welcomeUser">

                                    <!-- To Set the userName inside the file. -->

                                    Welcome, <?= $this->request->session()->read('Auth.User.username');?>

                                </div>

                                <?php 

                                    echo $this->Html->link('Logout', ['controller' => 'Users','action' => 'logout'],['class'=>'logoutLink']); 

                                ?>
                                
                              <?php else:?>

                                    <div class="welcomeUser">

                                    <!-- To Set the userName inside the file. -->

                                    Welcome, Guest

                                </div>

                                <?php 

                                    echo $this->Html->link('Login', ['controller' => 'Users','action' => 'login'],['class'=>'logoutLink']); 

                                ?>

                            <?php endif; ?>

                        </div> <!-- /.navbar-collapse -->

                    </div> <!-- /.container-fluid -->

                </nav>  
            
            </div>  

        </div>

    </div><!-- container2 div -->

</div><!-- section2 div -->

<div class="section3">

    <div class="container2">

        <div class="insideBanner">

            <div class="insideBannerUpper">

                <h2>Dsaibliiyt Rteiermnet for fderela epmleyoes</h2>

            </div>

            <div class="insideBannerLower">

                <p> 

                    A paragraph (from the Ancient Greek παράγραφος 
                    paragraphos, "to write beside" or "written beside")
                    is a self-contained unit of a discourse in writing 
                    dealing with a particular point or idea. A paragraph 
                    consists of one or more sentences.Paragraphs are the 
                    building blocks of papers. Many students define paragraphs 
                    in terms of length: a paragraph is a group of at least five 
                    sentences, a paragraph is half a page long, etc. In reality, 
                    though, the unity and coherence of ideas among sentences is 
                    what constitutes a paragraph.

                </p>

            </div>  <!-- insideBannerLower -->

            <div class="insideBannerImgMainDiv">

                <div class="insideBannerImg">

                    <?= $this->Html->image('inquiry.jpg', array('alt' => 'CakePHP'));?>

                </div>

                <div class="insideBannerRegister" style="display:none;">

                    <!-- http://192.168.1.59/cakeDemoUpdated/Inquiry/add -->

                    <form role="form" id="inquiryForm" method="post" action="">    

                        <div class="form-group">

                            <input type="text" name="Inquiry[name]" placeholder="Name" class="form-control insideBannerRegisterName" required>

                        </div>

                        <div class="form-group">

                            <input type="text"  name="Inquiry[phoneNo]" class="form-control insideBannerRegisterphoneNo" placeholder="Phone No." required>

                        </div>

                        <div class="form-group">

                            <input type="email" name="Inquiry[email]" class="form-control insideBannerRegisterEmail" placeholder="Email Addr" required>

                        </div>

                        <div class="form-group">

                            <textarea name="Inquiry[query]" class="form-control insideBannerRegisterQuery" rows="5" placeholder="Query" required>

                            </textarea>

                        </div>

                            <!-- Ajax is used to save data --> 
                            <button type="button" class="btn btn-default submitBtn">Submit</button>

                    </form>

                </div>

            </div><!-- insideBannerImgMainDiv div -->

        </div><!-- insideBanner div -->  

            <!--</div> 
        </div> row2 div -->

    </div>

</div><!-- section3 div -->

<script type="text/javascript">

    $(document).ready(function(){

        $(".submitBtn").click(function(){

            var url1 = "<?=$this->Url->build([ 'controller' => 'Inquiry', 'action' => 'add' ]);?>";
            
            $.ajax({

                type: 'POST',

                url: url1,    

                data:$('#inquiryForm').serialize(), 

                success: function(result){
    
                    alert(result);

                }
            });             

        });    

    });
</script>