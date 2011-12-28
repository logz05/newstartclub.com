{embed="embeds/_doc-top" 
  channel="my_health"
  title="NEWSTART Plan - Dashboard"}
{assign_variable:channel="my_health"}
{assign_variable:section="My Health"}
<style type="text/css">
#my_health .body ul li.lesson {
  position: relative;
  border-top: 1px solid #DDD;
  list-style: none;
  padding: 10px 5px;
  margin: 0;
}
ul .lesson:hover {
  background: #fafafa;
}
ul .lesson .summary {
  width: 80%;
  margin-right: -10px;
}
ul .lesson .summary
ul .lesson .status {
  display: inline-block;
}
ul .lesson .status {
  width: 20%;
  position: absolute;
  top: 12px;
  right: 5px;
  text-align: right;
}
ul .lesson .status .progress {
  width: 100%;
  float: right;
}
ul .lesson div.exercise {
float: left;
border-left: none;
}
ul .lesson div.exercise a {
  border: 1px solid #DDD;
  background: #EEE;
  border-left: none;
  padding: 5px 0;
  display: block;
  position: relative;
}
ul .lesson div.exercise:first-child a {
  border-left: 1px solid #ddd;
}
ul .lesson div.exercise a:hover {
  background: #f4dae9;
}
ul .lesson h4.lesson_link {
  font-size: 18px;
}
ul .lesson h4 {
  margin: 0;
  font-size: 12px;
}
ul .lesson {

}
</style>
  <ul id="trail">
    <li><a href="/">Home</a></li>
    <li><a href="/{channel}/">{section}</a></li>
  </ul>
  <div class="heading clearfix">
    <h1>Dashboard</h1>
  </div>
  <div class="grid23 clearfix">
    <div class="single left">
      <ul class='lessons'>
<li class='lesson not_started published'>
  <div>
    <div class='summary'>
      <h4 class='lesson_link'>
      <a href='/newstart-plan/nutrition'>Nutrition</a>
      </h4>
      <p>Description for Nutrition goes here.</p>
    </div>
    <div class='status'>
      <div class='progress'>
        <div class='exercise' style='width: 33.3%;'>
          <a class='not_started' href='#'>
          </a>
        </div>
        <div class='exercise' style='width: 33.3%;'>
          <a class='not_started' href='#'>
          </a>
        </div>
        <div class='exercise' style='width: 33.3%;'>
          <a class='not_started' href='#'>
          </a>
        </div>
      </div>
      <h4>
      Not started
      </h4>
    </div>
  </div>
</li>
<li class='lesson not_started published'>
  <div>
    <div class='summary'>
      <h4 class='lesson_link'>
      <a href='/newstart-plan/exercise'>Exercise</a>
      </h4>
      <p>Description for Exercise goes here.</p>
    </div>
    <div class='status'>
      <div class='progress'>
        <div class='exercise' style='width: 20%;'>
          <a class='not_started' href='#'>
          </a>
        </div>
        <div class='exercise' style='width: 20%;'>
          <a class='not_started' href='#'>
          </a>
        </div>
        <div class='exercise' style='width: 20%;'>
          <a class='not_started' href='#'>
          </a>
        </div>
        <div class='exercise' style='width: 20%;'>
          <a class='not_started' href='#'>
          </a>
        </div>
        <div class='exercise' style='width: 20%;'>
          <a class='not_started' href='#'>
          </a>
        </div>
      </div>
      <h4>
      Not started
      </h4>
    </div>
  </div>
</li>
<li class='lesson not_started published'>
  <div>
    <div class='summary'>
      <h4 class='lesson_link'>
      <a href='/newstart-plan/water'>Water</a>
      </h4>
      <p>Description for Water goes here.</p>
    </div>
    <div class='status'>
      <div class='progress'>
        <div class='exercise' style='width: 25%;'>
          <a class='not_started' href='#'>
          </a>
        </div>
        <div class='exercise' style='width: 25%;'>
          <a class='not_started' href='#'>
          </a>
        </div>
        <div class='exercise' style='width: 25%;'>
          <a class='not_started' href='#'>
          </a>
        </div>
        <div class='exercise' style='width: 25%;'>
          <a class='not_started' href='#'>
          </a>
        </div>
      </div>
      <h4>
      Not started
      </h4>
    </div>
  </div>
</li>
</ul>
    </div><!--/.single-->
    <div class="sidebar right">
      <div class="bar">Have a Question?</div>
      <p>Our NEWSTART&reg; partnering staff and physicians can answer your questions.</p>
      <p class="button-wrap">
        <a href="/questions/ask" class="super secondary button"><span>Ask Now</span></a>
      </p>
      <div class="bar">Need Help?</div>
      <p>Changing your lifestyle can be hard. That's why we offer support from NEWSTART&reg; sponsoring schools, churches, and health care organizations to help you succeed. Contact your local sponsor for nutritional counseling, NEWSTART&reg; book and DVD offers, and help with your exercise program.</p>
      <p class="button-wrap">
        <a href="/locations/{exp:user:stats dynamic="off"}{exp:weblog:entries weblog="locations" search:sponsor_zip="{zipCode}" limit="1"}detail/{url_title}{/exp:weblog:entries}{/exp:user:stats}" title="{title}" class="super secondary button"><span>Get Help</span></a>
      </p>
    </div><!--/.sidebar-->
  </div><!--/.grid23-->
{embed="embeds/_doc-bottom"}