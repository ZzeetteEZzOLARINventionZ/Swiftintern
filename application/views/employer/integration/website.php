<?php require_once $dir_employer.'requires/header.php';?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Website Integration</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="form-group">
                <textarea class="form-control" cols="40" placeholder="refresh the page to generate"><iframe src="http://localhost/swiftintern/iframe/opportunities/<?php echo $company->id;?>"></iframe></textarea>
                </div>
            </div>
            <hr>

            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-9">
                            <h3 class="sub-heading"><i class="fa fa-check-circle fa-fw"></i> Students Apply Directly from your Website</h3>
                            <p>With Website Integration students can directly apply to the opportunities(internships, competitions, test etc) created by you on swiftintern.com</p>
                            <p></p>
                        </div>
                        <div class="col-md-3">
                            <img src="<?php echo $cdn.'img/resume/iframe-website.png' ?>" alt="<?php echo $title;?>" class="thumbnail" width=200>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-9">
                            <h3 class="sub-heading"><i class="fa fa-check-circle fa-fw"></i> Efficient Code</h3>
                            <p>Paste the code posted above any where in between the body tag of html of your website to show all the oppoortunities posted by you. </p>
                            <p></p>
                        </div>
                        <div class="col-md-3">
                            <img src="<?php echo $cdn.'img/resume/code.jpg' ?>" alt="<?php echo $title;?>" class="thumbnail" width=150>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php require_once $dir_employer.'requires/footer.php';?>