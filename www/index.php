<!DOCTYPE html>
<html>
  <head>
    <title>lsharp DB</title>
    <link href="css/bootstrap-theme.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
  </head>
  <body>
    <div id="championModal">
      <div abindex="-1" aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="championModalLabel">
                Modal title
              </h4>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row" id="championScripts">
                  <div class="scriptWrapper col-sm-12 alert-success">
                    <div class="row">
                      <div class="col-sm-10">
                        <h4 class="scriptName">
                          JinxOneKeyToWin
                        </h4>
                      </div>
                      <div class="scriptUpvotes col-sm-2">
                        <h4>
                          <span class="badge"><i class="fa fa-arrow-up"></i> 203</span>
                        </h4>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <p class="scriptAuthor">
                          MartinEU
                        </p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="scriptControls col-sm-6">
                        <a class="btn-sm btn-primary" href="#">Github</a><a class="btn-sm btn-primary" href="#">Install</a><a class="btn-sm btn-primary" href="#">Forum</a>
                      </div>
                      <div class="scriptVoting col-sm-6">
                        <a class="btn-sm btn-danger" href="#"><i class="fa fa-arrow-down"></i></a><a class="btn-sm btn-success" href="#"><i class="fa fa-arrow-up"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" data-dismiss="modal" type="button">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="row">
          <div class="navbar-header">
            <a class="navbar-brand" href="#"><img alt="LSDB" src="img/logo.png" /></a><button class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active">
                <a href="#">Champions</a>
              </li>
              <li>
                <a href="#">Other</a>
              </li>
              <li>
                <a href="mailto:lsdb@dosh.dk">Missing Assembly?</a>
              </li>
            </ul>
            <form class="navbar-form navbar-right" role="search">
              <div class="form-group">
                <input class="form-control" placeholder="Search" type="text" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="navbar navbar-default" id="options">
          <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-2" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">Filter<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="#"> Assassin</a>
                  </li>
                  <li>
                    <a href="#"> Fighter</a>
                  </li>
                  <li>
                    <a href="#"> Mage</a>
                  </li>
                  <li>
                    <a href="#"> Marksman</a>
                  </li>
                  <li>
                    <a href="#"> Support</a>
                  </li>
                  <li>
                    <a href="#"> Tank</a>
                  </li>
                </ul>
              </li>
              <li class="dropdown">
                <a aria-expanded="false" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">Order<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="#"> Last Commit</a>
                  </li>
                  <li>
                    <a href="#"> Upvotes</a>
                  </li>
                  <li>
                    <a href="#"> Comments</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container" id="championGrid">
      <div class="row" id="championRow"></div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/fancy.js"></script>
  </body>
</html>
