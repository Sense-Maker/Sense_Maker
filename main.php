<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Agency - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/agency.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<!-- Navigation -->
<body id="page-top" class="index">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="landing_page.html">Make Sense</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Feedback</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>


<?php
$year=$_GET["year"];
$compare=$_GET["compare"];
$problem=$_GET["problem"];
$comparison_number=$_GET["comparison_number"];
//$deaths;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sense_makers_trial_two";
$decision=0;
//-------------------------bull shit code------
$iot=500;

//-----------------------------------------
if($compare=="stadiums")
{
	$decision=1;
}
else if($compare=="terror attacks")
{
	$decision=2;
}
else if($compare=="natural disasters")
{
	$decision=3;
}
else 
{
	$decision=4;
}




//===============================




// =====================================
// Create connection
$conn1 = new mysqli($servername, $username, $password, $dbname);
//echo $year;
$sql2 = "SELECT number_of_deaths FROM table_7 WHERE year=".$year;
$result2 = $conn1->query($sql2);
//get deaths


while($row2 = $result2->fetch_assoc() )
{
	if($problem=="")
	{
	$deaths=(int)$row2['number_of_deaths'];
	}
	else
	{
		$deaths=$comparison_number;
	}
}
$conn1->close();
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
/*$conn2 = new mysqli($servername, $username, $password, $dbname);
$sql1="SELECT capacity from table_5 WHERE country="."'".$_GET["location"]."'" ."AND capacity<".$deaths;
$sql2 = "SELECT casualties FROM table_2 WHERE country="."'".$_GET["location"]."'" ."AND casualties < ".$deaths ;
$sql3= "SELECT casualties FROM table_3 WHERE country="."'".$_GET["location"]."'" ."AND casualties < ".$deaths ;
$sql4="SELECT casualties FROM table_4 WHERE country="."'".$_GET["location"]."'" ."AND casualties < ".$deaths ;
$result1 = $conn2->query($sql1);
$result2 = $conn2->query($sql2);
$result3 = $conn2->query($sql3);
$result4 = $conn2->query($sql4);
$row1 = $result1->fetch_assoc();
  $similar1 = $row1['capacity'];

$conn2->close();
*/
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection


if($decision==1)
{

     $sql = "SELECT capacity,stadium FROM table_5 WHERE country="."'".$_GET["location"]."'" ."AND capacity < ".$deaths ;
    // $sql = "SELECT capacity,stadium FROM table_5 WHERE country="."'".$_GET["location"]."'" ;
}
else if($compare=="terror attacks")
{
	$sql = "SELECT country,casualties,year,description FROM table_2 WHERE country="."'".$_GET["location"]."'" ."AND casualties < ".$deaths ;

}
else if($compare=="natural disasters")
{
		$sql = "SELECT country,casualties,year,description FROM table_3 WHERE country="."'".$_GET["location"]."'" ."AND casualties < ".$deaths ;


}
else
{
		$sql = "SELECT country,casualties,year,description FROM table_4 WHERE country="."'".$_GET["location"]."'" ."AND casualties < ".$deaths ;

}
$result = $conn->query($sql);
/*if($decision==1)
{
	if($problem!="")
	{
		while($row = $result->fetch_assoc())
		{
		$similar = $row['capacity'];// ERROR !!!!!!!!!!!!!!!!!!!!!!!!
        $relation = ($deaths/(float)$similar) ;

    	$final= number_format($relation,2);
    	if($final<1.10)
    	{
    		//echo "the number of". $problem." is equal to the capacity of   "." ".$row['stadium'];
    		$abc="the number of". $problem." is equal to the capacity of   "." ".$row['stadium'];
    		echo '<html><header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">'.$abc.'</div>
                
            </div>
        </div>
    </header>
    </html>';

    	}
    	else
    	{
    	$abc= "the number of".$problem. "is".$final."times the capacity of  "." ".$row['stadium'];
    	 echo '<html><header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">'.$abc.'</div>
                
            </div>
        </div>
    </header>
    </html>';
        }

     	break;
     }



	}
}*/
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc() ) {
     	if($decision==1)
     	{
     		
        //echo "<br>  -stadium-  ".$row['stadium']."capacity-".$row['capacity']."<br>";
        $similar = $row['capacity'];
        $relation = ($deaths/(float)$similar) ;

    	$final= number_format($relation,2);
    	
     if($problem==""){
     	
    	if($final<1.10)
    	{
    		$abc= "the number of farmer deaths in india is equal to the capacity of "." ".$row['stadium'];
    		 echo '<html><header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading" >'.$abc.'</div>
                
            </div>
        </div>
    </header>
    </html>';

    	}
    	else
    	{
    	$abc= "the number of farmer deaths in india is ".$final." times the capacity of "." ".$row['stadium'];
    	 echo '<html><header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">'.$abc.'</div>
                
            </div>
        </div>
    </header>
    </html>';
        }
     	break;
     }
     else
     {
     	
     	if($final<1.10)
    	{
    		$abc= "the number of ". $problem." is equal to the capacity of   "." ".$row['stadium'];
    		 echo '<html><header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">'.$abc.'</div>
                
            </div>
        </div>
    </header>
    </html>';

    	}
    	else
    	{
    	$abc= "the number of ".$problem. " is ".$final." times the capacity of  "." ".$row['stadium'];
    	 echo '<html><header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">'.$abc.'</div>
                
            </div>
        </div>
    </header>
    </html>';
        }

     	break;
     }

     }
     else if($decision==2)
     {
     	$similar = $row['casualties'];
        $relation = ($deaths/(float)$similar) ;

    	$final= number_format($relation,2);
    	if($problem=="")
    	{
    	if($final<1.10)
    	{
    		$abc= "the number of farmer deaths in india is equal to the number of casualties in   "." ".$row['country']." during the year ".$row['year']." due to the ".$row['description'];
    		 echo '<html><header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">'.$abc.'</div>
                
            </div>
        </div>
    </header>
    </html>';

    	}
    	else
    	{
    	//echo "the number of farmer deaths in india is".$final."times the number of casualties in   "." ".$row['country']."during the year".$row['year']."due to the ".$row['description'];
    		$abc="the number of farmer deaths in india is ".$final." times the number of casualties in   "." ".$row['country']." during the year ".$row['year']."due to the ".$row['description'];
        echo '<html><header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">'.$abc.'</div>
                
            </div>
        </div>
    </header>
    </html>';
        }

     	break;
     }
     else
     {
     	if($final<1.10)
    	{
    		$abc= "the number of ". $problem." is equal to the number of casualties in   "." ".$row['country']." during the year ".$row['year']." due to the ".$row['description'];
    		 echo '<html><header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">'.$abc.'</div>
                
            </div>
        </div>
    </header>
    </html>';

    	}
    	else
    	{
    	$abc= "the number of ".$problem. " is ".$final." times the number of casualties in   "." ".$row['country']." during the year ".$row['year']." due to the ".$row['description'];
    	 echo '<html><header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">'.$abc.'</div>
                
            </div>
        </div>
    </header>
    </html>';
        }

     	break;
     }



     }
     else if($decision==3)
     {
     	$similar = $row['casualties'];
        $relation = ($deaths/(float)$similar) ;

    	$final= number_format($relation,2);
    	if($problem=="")
    	{
    	if($final<1.10)
    	{
    		$abc= "the number of farmer deaths in india is equal to the number of casualties in   "." ".$row['country']." during the year ".$row['year']." due to the ".$row['description'];
    		 echo '<html><header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">'.$abc.'</div>
                
            </div>
        </div>
    </header>
    </html>';

    	}
    	else
    	{
    	$abc= "the number of farmer deaths in india is ".$final." times the number of casualties in   "." ".$row['country']." during the year ".$row['year']." due to the ".$row['description'];
    	 echo '<html><header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">'.$abc.'</div>
                
            </div>
        </div>
    </header>
    </html>';
        }
     	break;
     }
     else
     {
     	if($final<1.10)
    	{                         //CHANGE HERE
    		$abc= "the number of ".$problem." is equal to the number of casualties in   "." ".$row['country']." during the year ".$row['year']." due to the ".$row['description'];
    		 echo '<html><header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">'.$abc.'</div>
                
            </div>
        </div>
    </header>
    </html>';

    	}
    	else
    	{
    	$abc= "the number of ".$problem."  is ".$final." times the number of casualties in   "." ".$row['country']." during the year".$row['year']." due to the ".$row['description'];
    	 echo '<html><header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">'.$abc.'</div>
                
            </div>
        </div>
    </header>
    </html>';
        }
        break;
}
     }
     else //decision =4
     {

         
     	$similar = $row['casualties'];
        $relation = ($deaths/(float)$similar) ;

    	$final= number_format($relation,2);
    	
    	if($problem=="")
    	{
    		
    	if($final<1.10)
    	{
    		$abc= "the number of farmer deaths in india is equal to the number of casualties in   "." ".$row['country']." during the year ".$row['year']." due to the ".$row['description'];
    		 echo '<html><header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">'.$abc.'</div>
                
            </div>
        </div>
    </header>
    </html>';

    	}
    	else
    	{
    		
    	$abc= "the number of farmer deaths in india is ".$final." times the number of casualties in   "." ".$row['country']." during the year".$row['year']." due to the ".$row['description'];
    	 echo '<html><header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">'.$abc.'</div>
                
            </div>
        </div>
    </header>
    </html>';
        }
     	break;
     }
     else
     {

     		if($final<1.10)
    	{
    		$abc= "the number of ". $problem."  is equal to the number of casualties in   "." ".$row['country']." during the year ".$row['year']." due to the ".$row['description'];
    		 echo '<html><header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">'.$abc.'</div>
                
            </div>
        </div>
    </header>
    </html>';

    	}
    	else
    	{
    	$abc= "the number of ".$problem." is ".$final." times the number of casualties in   "." ".$row['country']." during the year ".$row['year']." due to the ".$row['description'];
    	 echo '<html><header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading">'.$abc.'</div>
                
            </div>
        </div>
    </header>
    </html>';
        }
     	break;









     }
     }
     }
} else {
     echo "0 results";
}

$conn->close();
//cnjsancjascskcansjcalsclkjasljclkasjcjslakhcjasjlc
echo "<style>

.node circle {
  cursor: pointer;
  stroke: #3182bd;
  stroke-width: 1.5px;
}

.node text {
  font: 10px sans-serif;
  pointer-events: none;
  text-anchor: middle;
}

line.link {
  fill: none;
  stroke: #9ecae1;
  stroke-width: 1.5px;
}

</style>";
echo "<script type=\"text/javascript\" src=\"d3\d3.v3.js\"></script>";
echo "<script>

var width = 1024,
    height = 768,
    root;

var force = d3.layout.force()
    .linkDistance(200)
//    .charge(-120)
    .charge(-200)
  //  .gravity(.05)
    .gravity(.05)
    .size([width, height])
    .on(\"tick\", tick);

var svg = d3.select(\"body\").append(\"svg\")
    .attr(\"width\", width)
    .attr(\"height\", height);

var link = svg.selectAll(\".link\"),
    node = svg.selectAll(\".node\");


d3.json(\"d3/d3_layout.json\", function(error, json) {
  root = json;
  update();
});

function update() {
  var nodes = flatten(root),
      links = d3.layout.tree().links(nodes);

  // Restart the force layout.
  force
      .nodes(nodes)
      .links(links)
      .start();

  // Update links.
  link = link.data(links, function(d) { return d.target.id; });

  link.exit().remove();

  link.enter().insert(\"line\", \".node\")
      .attr(\"class\", \"link\");

  // Update nodes.
  node = node.data(nodes, function(d) { return d.id; });

  node.exit().remove();

  var nodeEnter = node.enter().append(\"g\")
      .attr(\"class\", \"node\")
      .on(\"click\", click)
      .call(force.drag);               /*-------------------------need to change values here------------------------------------*/

var stadium_number = 500,
    terrorist_number=250,
    natural_number = 400,
    industrial_number = 800;

function collide(alpha) {
  var quadtree = d3.geom.quadtree(nodes);
  return function(d) {
    var r = d.radius + maxRadius + Math.max(padding, clusterPadding),
        nx1 = d.x - r,
        nx2 = d.x + r,
        ny1 = d.y - r,
        ny2 = d.y + r;
    quadtree.visit(function(quad, x1, y1, x2, y2) {
      if (quad.point && (quad.point !== d)) {
        var x = d.x - quad.point.x,
            y = d.y - quad.point.y,
            l = Math.sqrt(x * x + y * y),
            r = d.radius + quad.point.radius + (d.cluster === quad.point.cluster ? padding : clusterPadding);
        if (l < r) {
          l = (l - r) / l * alpha;
          d.x -= x *= l;
          d.y -= y *= l;
          quad.point.x += x;
          quad.point.y += y;
        }
      }
      return x1 > nx2 || x2 < nx1 || y1 > ny2 || y2 < ny1;
    });
  };
}

  nodeEnter.append(\"circle\")
      .attr(\"r\", function(d) { 

            if(d.id==1) {return stadium_number/6;} 
            else if(d.id==2) {return terrorist_number/6;} 
            else if(d.id==3) {return natural_number/6;}
            else if(d.id==4) {return industrial_number/6;}
            else
            {
                return 300/6;
            }

        });
 
    

  nodeEnter.append(\"image\")
    
      .attr(\"xlink:href\", function(d) { 
            if(d.id==1) {return \"svgs/stadium.svg\";} 
            else if(d.id==2) {return \"svgs/terrorist.svg\";} 
            else if(d.id==3) {return \"svgs/natural_disaster.svg\";}
            else if(d.id==4) {return \"svgs/industrial_disaster.svg\";}
            else
            {
                return ;
            }
            })
      .attr(\"x\", -8)
      .attr(\"y\", -8)
      .attr(\"width\", 60)
      .attr(\"height\", 60);

  nodeEnter.append(\"text\")
      .attr(\"dy\", \".35em\")
      .text(function(d) { return d.name; });

  node.select(\"circle\")
      .style(\"fill\", color);
}

function tick() {
    
    node
      .attr(\"transform\", function(d) { return \"translate(\" + d.x + \",\" + d.y + \")\"; });  
    link.attr(\"x1\", function(d) { return d.source.x; })
      .attr(\"y1\", function(d) { return d.source.y; })
      .attr(\"x2\", function(d) { return d.target.x; })
      .attr(\"y2\", function(d) { return d.target.y; });

  
     
}

function color(d) {
  return d._children ? \"#3182bd\" 
      : d.children ? \"#c6dbef\" 
      : \"#fd8d3c\"; // leaf node
}

// Toggle children on click.
function click(d) {
  if (d3.event.defaultPrevented) return; // ignore drag
  if (d.children) {
    d._children = d.children;
    d.children = null;
  } else {
    d.children = d._children;
    d._children = null;
  }
  update();
}

// Returns a list of all nodes under the root.
function flatten(root) {
  var nodes = [], i = 0;

  function recurse(node) {
    if (node.children) node.children.forEach(recurse);
    if (!node.id) node.id = ++i;
    nodes.push(node);
  }

  recurse(root);
  return nodes;
}

</script>";

?>  

<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Feedback</h2>
                    <h3 class="section-subheading text-muted">Did the information make sense to you?</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Yes/No" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>                                
                            </div>

                            <div class="col-md-6">
                                <div id="success"></div>
                                <button  class="btn btn-xl">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>



</body>
</html>