
<!doctype html>
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>digidiet—by apiary.io</title>
    <meta name="description" content="a place where APIs are kept">
  <meta name="author" content="apiary.io">

  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="chrome=1">

  <link rel="shortcut icon" href="https://apiary.a.ssl.fastly.net/assets/icons/favicon-aa8fc5808796304b.ico">
  <link rel="apple-touch-icon-precomposed" href="https://apiary.a.ssl.fastly.net/assets/icons/apple-touch-icon-precomposed-16cb9301e5cd0912.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://apiary.a.ssl.fastly.net/assets/icons/apple-touch-icon-72x72-precomposed-88b45e069ad376bd.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://apiary.a.ssl.fastly.net/assets/icons/apple-touch-icon-114x114-precomposed-166416e5d92f4c45.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://apiary.a.ssl.fastly.net/assets/icons/apple-touch-icon-144x144-precomposed-54504235b83a48b2.png">

  <link rel="stylesheet" href="https://apiary.a.ssl.fastly.net/assets/css/normalize-c1a6015040ef1201.css">
  <link rel="stylesheet" href="https://apiary.a.ssl.fastly.net/assets/css/font-awesome-b2431b0e6805305e.css" media="screen, presentation, print" />
  <link rel="stylesheet" href="https://apiary.a.ssl.fastly.net/assets/css/docs-705c47736c62a9f3.css" media="screen, presentation" />
  <link rel="stylesheet" href="https://apiary.a.ssl.fastly.net/assets/css/head-foot-a96d2863cc6910b3.css" media="screen, presentation" />
  <link rel="stylesheet" href="https://apiary.a.ssl.fastly.net/assets/css/multi-34d5951a94212c5c.css" media="screen, presentation" />

  <link rel="stylesheet" href="https://apiary.a.ssl.fastly.net/assets/css/sign-in-sign-up-2d99b63c73a77cce.css" media="screen, presentation" />

  <link rel="stylesheet" href="https://apiary.a.ssl.fastly.net/assets/css/print-646a9a8b753c30bf.css" media="print" />

  <link rel="stylesheet" href="https://apiary.a.ssl.fastly.net/assets/js/libs/prism/prism-ac8b50ad63b3f96b.css" media="screen, presentation" />
  <script src="https://apiary.a.ssl.fastly.net/assets/js/libs/prism/prism-4c17cf9b7b332e9e.js" data-manual></script>

  <script src="https://apiary.a.ssl.fastly.net/assets/js/libs/jquery-1.8.3-1deb5370ece3ab15.js"></script>

</head>

<body class="themeDark">

<div id="container" style="padding-top: 0px">

  

<div id="documentationContainer">

   
<script>window.docResources = {};</script>

<div id="leftColumn">
  <h1 id="apiHeadline">digidiet</h1>

  <div class="details"><p>digidiet API provides RESTful access to digidiet User and Recipe resources.</p></div>
        <a name="user"></a>
    <div class="chapterWrapper">
              <hgroup class="chapter">
          <h1>User</h1>          <div class="details"><p>User related resources of the <strong>digidiet API</strong></p></div>
                  </hgroup>
      
                                            <div class="sameResourceGroup">
        
                  <h2 class="nameResource">Index and Store</h2>                      <div class="descriptionMethod"><p>Display a user or store a new user.</p></div>
                  
                  <h3 class="nameMethod">List all Users</h3>
        
        <section class="resource noActivity hasDescription">
          <hgroup>
            <h1 class="methodGet"><span>GET</span></h1>
            <h2>/user</h2>
            <a class="resourcePermalink" href="#get-%2Fuser" name="get-%2Fuser"><span> </span></a>
            <div class="toggle"></div>
                          <div class="commentsCount">
                <a href="#" class="commentsCountLink">Add Comment</a>
              </div>
                      </hgroup>

                              <div class="content">
            <nav class="switch">
              <ul>
                <a href="#example" class="active"><li><span>Example</span></li></a>
                                  <a href="#debugger"><li><span>Debugger</span></li></a>
                                                  <a href="#social"><li><span>Comments</span></li></a>
                                                  <a href="#tryit" class="jsTryitSwitcher"><li><span>Try It</span></li></a>
                              </ul>
            </nav>
            <section class="example">
                            <nav class="language">
                <form name="languageSwitcher">
                  <p>Show code sample</p>
                  <select>
                                          <option value="raw">none (raw data)</option>
                                          <option value="curl">curl</option>
                                          <option value="csharp">C#</option>
                                          <option value="javascript">javascript</option>
                                          <option value="nodejs">node.js</option>
                                          <option value="python">python</option>
                                          <option value="php">php</option>
                                          <option value="ruby">ruby</option>
                                          <option value="vb">Visual Basic</option>
                                      </select>
                </form>
              </nav>
                            <section class="code" id="generatedResourceCodeS1E1">                                                      <script>
window.docResources["generatedResourceCodeS1E1"] = (window.docResources["generatedResourceCodeS1E1"] || []).concat({
  "url": "/user",
  "method": "GET",
  "headers": {},
  "body": "digidiet/user"
});
</script>
                                                                    <p class="ioDesc">Response</p>
                  <section class="outgoingCall">
                    <pre class="outgoing outgoingHeaders"><code>200 (OK)
Content-Type: application/json</code></pre>
                    <pre class="outgoing"><code class="language-javascript">[{&#34;id&#34;: 1, 
  &#34;username&#34;: &#34;admin&#34;,
  &#34;password&#34;: &#34;password&#34;,
  &#34;name&#34;: &#34;Admin Istrator&#34;,
  &#34;about_me&#34;: &#34;I administrate&#34;,
  &#34;avatar&#34;: &#34;admin.png&#34;,
  &#34;location&#34;: &#34;adminville, AD&#34; },
  {&#34;id&#34;: 2, 
  &#34;username&#34;: &#34;rainbowkitty&#34;,
  &#34;password&#34;: &#34;raaiiinbowww&#34;,
  &#34;name&#34;: &#34;Rainbow Kitty&#34;,
  &#34;about_me&#34;: &#34;raaiiinbowww&#34;,
  &#34;avatar&#34;: &#34;rainbowkitty.jpg&#34;,
  &#34;location&#34;: &#34;raaiiinbowww&#34; }
  ]</code></pre>
                  </section>
                                                                </section>
            </section>
                          <section class="debugger" data-resource-signature="GET /user"></section>
                            <section class="social">
                <nav class="switch"></nav>

                <section class="newPost">
                  <form action="/discussion/53404c1f62d9d40200009f66" method="post">
                     <textarea placeholder="Start a new thread…" name="comment"></textarea>
                     <div class="postControl">
                       <div class="postTools">
                         <input class="button blue big" type="submit" value="Submit">
                         <a class="cancel" href="#"><i class="icon-remove"></i> Cancel</a>
                       </div>
                     </div>
                     <input type="hidden" name="url" value="/user">
                     <input type="hidden" name="method" value="GET" >
                  </form>
                </section>

                                <section class="all" name="thread">
                                  </section>
                              </section>
              
              <section class="tryit">
                <form name="jsRunExample">
                  <span class="ajaxLoader block jsEmptyTryit"></span>
                </form>
              </section>
                      </div>

          
        </section>                      
        
                  <h3 class="nameMethod">Store a User</h3>
        
        <section class="resource noActivity hasDescription">
          <hgroup>
            <h1 class="methodPost"><span>POST</span></h1>
            <h2>/user</h2>
            <a class="resourcePermalink" href="#post-%2Fuser" name="post-%2Fuser"><span> </span></a>
            <div class="toggle"></div>
                          <div class="commentsCount">
                <a href="#" class="commentsCountLink">Add Comment</a>
              </div>
                      </hgroup>

                              <div class="content">
            <nav class="switch">
              <ul>
                <a href="#example" class="active"><li><span>Example</span></li></a>
                                  <a href="#debugger"><li><span>Debugger</span></li></a>
                                                  <a href="#social"><li><span>Comments</span></li></a>
                                                  <a href="#tryit" class="jsTryitSwitcher"><li><span>Try It</span></li></a>
                              </ul>
            </nav>
            <section class="example">
                            <nav class="language">
                <form name="languageSwitcher">
                  <p>Show code sample</p>
                  <select>
                                          <option value="raw">none (raw data)</option>
                                          <option value="curl">curl</option>
                                          <option value="csharp">C#</option>
                                          <option value="javascript">javascript</option>
                                          <option value="nodejs">node.js</option>
                                          <option value="python">python</option>
                                          <option value="php">php</option>
                                          <option value="ruby">ruby</option>
                                          <option value="vb">Visual Basic</option>
                                      </select>
                </form>
              </nav>
                            <section class="code" id="generatedResourceCodeS1E2">                                                      <script>
window.docResources["generatedResourceCodeS1E2"] = (window.docResources["generatedResourceCodeS1E2"] || []).concat({
  "url": "/user",
  "method": "POST",
  "contentType": "application/json",
  "headers": {
    "Content-Type": "application/json"
  },
  "body": "{ \"username\": \"admin\",\n  \"password\": \"password\",\n  \"name\": \"Admin Istrator\",\n  \"about_me\": \"I administrate\",\n  \"avatar\": \"admin.png\",\n  \"location\": \"adminville, AD\" }"
});
</script>
                                                                    <p class="ioDesc">Response</p>
                  <section class="outgoingCall">
                    <pre class="outgoing outgoingHeaders"><code>201 (Created)</code></pre>
                    <pre class="outgoing"><code class=""></code></pre>
                  </section>
                                                                </section>
            </section>
                          <section class="debugger" data-resource-signature="POST /user"></section>
                            <section class="social">
                <nav class="switch"></nav>

                <section class="newPost">
                  <form action="/discussion/53404c1f62d9d40200009f66" method="post">
                     <textarea placeholder="Start a new thread…" name="comment"></textarea>
                     <div class="postControl">
                       <div class="postTools">
                         <input class="button blue big" type="submit" value="Submit">
                         <a class="cancel" href="#"><i class="icon-remove"></i> Cancel</a>
                       </div>
                     </div>
                     <input type="hidden" name="url" value="/user">
                     <input type="hidden" name="method" value="POST" >
                  </form>
                </section>

                                <section class="all" name="thread">
                                  </section>
                              </section>
              
              <section class="tryit">
                <form name="jsRunExample">
                  <span class="ajaxLoader block jsEmptyTryit"></span>
                </form>
              </section>
                      </div>

          
        </section>              </div>                  <div class="sameResourceGroup">
        
                  <h2 class="nameResource">Create</h2>                      <div class="descriptionMethod"><p>Show the form for creating a new user</p></div>
                  
                  <h3 class="nameMethod">Create a User</h3>
        
        <section class="resource noActivity hasDescription">
          <hgroup>
            <h1 class="methodGet"><span>GET</span></h1>
            <h2>/user/create</h2>
            <a class="resourcePermalink" href="#get-%2Fuser%2Fcreate" name="get-%2Fuser%2Fcreate"><span> </span></a>
            <div class="toggle"></div>
                          <div class="commentsCount">
                <a href="#" class="commentsCountLink">Add Comment</a>
              </div>
                      </hgroup>

                              <div class="content">
            <nav class="switch">
              <ul>
                <a href="#example" class="active"><li><span>Example</span></li></a>
                                  <a href="#debugger"><li><span>Debugger</span></li></a>
                                                  <a href="#social"><li><span>Comments</span></li></a>
                                                  <a href="#tryit" class="jsTryitSwitcher"><li><span>Try It</span></li></a>
                              </ul>
            </nav>
            <section class="example">
                            <nav class="language">
                <form name="languageSwitcher">
                  <p>Show code sample</p>
                  <select>
                                          <option value="raw">none (raw data)</option>
                                          <option value="curl">curl</option>
                                          <option value="csharp">C#</option>
                                          <option value="javascript">javascript</option>
                                          <option value="nodejs">node.js</option>
                                          <option value="python">python</option>
                                          <option value="php">php</option>
                                          <option value="ruby">ruby</option>
                                          <option value="vb">Visual Basic</option>
                                      </select>
                </form>
              </nav>
                            <section class="code" id="generatedResourceCodeS1E3">                                                      <script>
window.docResources["generatedResourceCodeS1E3"] = (window.docResources["generatedResourceCodeS1E3"] || []).concat({
  "url": "/user/create",
  "method": "GET",
  "headers": {},
  "body": "digidiet/user/create"
});
</script>
                                                                    <p class="ioDesc">Response</p>
                  <section class="outgoingCall">
                    <pre class="outgoing outgoingHeaders"><code>200 (OK)</code></pre>
                    <pre class="outgoing"><code class="">makes view: digidiet/register</code></pre>
                  </section>
                                                                </section>
            </section>
                          <section class="debugger" data-resource-signature="GET /user/create"></section>
                            <section class="social">
                <nav class="switch"></nav>

                <section class="newPost">
                  <form action="/discussion/53404c1f62d9d40200009f66" method="post">
                     <textarea placeholder="Start a new thread…" name="comment"></textarea>
                     <div class="postControl">
                       <div class="postTools">
                         <input class="button blue big" type="submit" value="Submit">
                         <a class="cancel" href="#"><i class="icon-remove"></i> Cancel</a>
                       </div>
                     </div>
                     <input type="hidden" name="url" value="/user/create">
                     <input type="hidden" name="method" value="GET" >
                  </form>
                </section>

                                <section class="all" name="thread">
                                  </section>
                              </section>
              
              <section class="tryit">
                <form name="jsRunExample">
                  <span class="ajaxLoader block jsEmptyTryit"></span>
                </form>
              </section>
                      </div>

          
        </section>              </div>                  <div class="sameResourceGroup">
        
                  <h2 class="nameResource">Show, Update, and Destroy</h2>                      <div class="descriptionMethod"><p>View a user profile by ID, update the specified user in storage, and delete a user</p></div>
                  
                  <h3 class="nameMethod">Show a User</h3>
        
        <section class="resource noActivity hasDescription">
          <hgroup>
            <h1 class="methodGet"><span>GET</span></h1>
            <h2>/user/{id}</h2>
            <a class="resourcePermalink" href="#get-%2Fuser%2F%7Bid%7D" name="get-%2Fuser%2F%7Bid%7D"><span> </span></a>
            <div class="toggle"></div>
                          <div class="commentsCount">
                <a href="#" class="commentsCountLink">Add Comment</a>
              </div>
                      </hgroup>

                                <article class="details">
                                          <div class="paramsTableWrap"><table class="paramsTable">
                <caption>Parameters</caption>
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Details</th>
                  </tr>
                </thead>
                <tbody>
                                      <tr>
                      <td>id</td>
                      <td><p>Numeric <code>id</code> of the User to display. Has example value.</p>
</td>
                      <td>number, required<br>example: <samp>1</samp>                                              </td>
                    </tr>
                                  </tbody>
              </table></div>
                          </article>
                    <div class="content">
            <nav class="switch">
              <ul>
                <a href="#example" class="active"><li><span>Example</span></li></a>
                                  <a href="#debugger"><li><span>Debugger</span></li></a>
                                                  <a href="#social"><li><span>Comments</span></li></a>
                                                  <a href="#tryit" class="jsTryitSwitcher"><li><span>Try It</span></li></a>
                              </ul>
            </nav>
            <section class="example">
                            <nav class="language">
                <form name="languageSwitcher">
                  <p>Show code sample</p>
                  <select>
                                          <option value="raw">none (raw data)</option>
                                          <option value="curl">curl</option>
                                          <option value="csharp">C#</option>
                                          <option value="javascript">javascript</option>
                                          <option value="nodejs">node.js</option>
                                          <option value="python">python</option>
                                          <option value="php">php</option>
                                          <option value="ruby">ruby</option>
                                          <option value="vb">Visual Basic</option>
                                      </select>
                </form>
              </nav>
                            <section class="code" id="generatedResourceCodeS1E4">                                                      <script>
window.docResources["generatedResourceCodeS1E4"] = (window.docResources["generatedResourceCodeS1E4"] || []).concat({
  "url": "/user/{id}",
  "method": "GET",
  "headers": {},
  "body": "/digidiet/user/1",
  "parameters": {
    "id": 1
  }
});
</script>
                                                                    <p class="ioDesc">Response</p>
                  <section class="outgoingCall">
                    <pre class="outgoing outgoingHeaders"><code>200 (OK)</code></pre>
                    <pre class="outgoing"><code class="">makes view: digidiet/profile with user: 1</code></pre>
                  </section>
                                                                </section>
            </section>
                          <section class="debugger" data-resource-signature="GET /user/{id}"></section>
                            <section class="social">
                <nav class="switch"></nav>

                <section class="newPost">
                  <form action="/discussion/53404c1f62d9d40200009f66" method="post">
                     <textarea placeholder="Start a new thread…" name="comment"></textarea>
                     <div class="postControl">
                       <div class="postTools">
                         <input class="button blue big" type="submit" value="Submit">
                         <a class="cancel" href="#"><i class="icon-remove"></i> Cancel</a>
                       </div>
                     </div>
                     <input type="hidden" name="url" value="/user/{id}">
                     <input type="hidden" name="method" value="GET" >
                  </form>
                </section>

                                <section class="all" name="thread">
                                  </section>
                              </section>
              
              <section class="tryit">
                <form name="jsRunExample">
                  <span class="ajaxLoader block jsEmptyTryit"></span>
                </form>
              </section>
                      </div>

          
        </section>                      
        
                  <h3 class="nameMethod">Update a User</h3>
        
        <section class="resource noActivity hasDescription">
          <hgroup>
            <h1 class="methodPost"><span>PUT</span></h1>
            <h2>/user/{id}</h2>
            <a class="resourcePermalink" href="#put-%2Fuser%2F%7Bid%7D" name="put-%2Fuser%2F%7Bid%7D"><span> </span></a>
            <div class="toggle"></div>
                          <div class="commentsCount">
                <a href="#" class="commentsCountLink">Add Comment</a>
              </div>
                      </hgroup>

                                <article class="details">
                                          <div class="paramsTableWrap"><table class="paramsTable">
                <caption>Parameters</caption>
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Details</th>
                  </tr>
                </thead>
                <tbody>
                                      <tr>
                      <td>id</td>
                      <td><p>Numeric <code>id</code> of the User to display. Has example value.</p>
</td>
                      <td>number, required<br>example: <samp>1</samp>                                              </td>
                    </tr>
                                  </tbody>
              </table></div>
                          </article>
                    <div class="content">
            <nav class="switch">
              <ul>
                <a href="#example" class="active"><li><span>Example</span></li></a>
                                  <a href="#debugger"><li><span>Debugger</span></li></a>
                                                  <a href="#social"><li><span>Comments</span></li></a>
                                                  <a href="#tryit" class="jsTryitSwitcher"><li><span>Try It</span></li></a>
                              </ul>
            </nav>
            <section class="example">
                            <nav class="language">
                <form name="languageSwitcher">
                  <p>Show code sample</p>
                  <select>
                                          <option value="raw">none (raw data)</option>
                                          <option value="curl">curl</option>
                                          <option value="csharp">C#</option>
                                          <option value="javascript">javascript</option>
                                          <option value="nodejs">node.js</option>
                                          <option value="python">python</option>
                                          <option value="php">php</option>
                                          <option value="ruby">ruby</option>
                                          <option value="vb">Visual Basic</option>
                                      </select>
                </form>
              </nav>
                            <section class="code" id="generatedResourceCodeS1E5">                                                      <script>
window.docResources["generatedResourceCodeS1E5"] = (window.docResources["generatedResourceCodeS1E5"] || []).concat({
  "url": "/user/{id}",
  "method": "PUT",
  "contentType": "application/JSON",
  "headers": {
    "Content-Type": "application/JSON"
  },
  "body": "{ \"username\": \"moderator\",\n\"password\": \"password\",\n\"first_name\": \"Notan\",\n\"last_name\": \"Admin\",\n\"about_me\": \"just a moderator now\",\n\"avatar\": \"thefall.jpg\",\n\"location\": \"moderation, CA\" }",
  "parameters": {
    "id": 1
  }
});
</script>
                                                                    <p class="ioDesc">Response</p>
                  <section class="outgoingCall">
                    <pre class="outgoing outgoingHeaders"><code>200 (OK)</code></pre>
                    <pre class="outgoing"><code class=""></code></pre>
                  </section>
                                                                </section>
            </section>
                          <section class="debugger" data-resource-signature="PUT /user/{id}"></section>
                            <section class="social">
                <nav class="switch"></nav>

                <section class="newPost">
                  <form action="/discussion/53404c1f62d9d40200009f66" method="post">
                     <textarea placeholder="Start a new thread…" name="comment"></textarea>
                     <div class="postControl">
                       <div class="postTools">
                         <input class="button blue big" type="submit" value="Submit">
                         <a class="cancel" href="#"><i class="icon-remove"></i> Cancel</a>
                       </div>
                     </div>
                     <input type="hidden" name="url" value="/user/{id}">
                     <input type="hidden" name="method" value="PUT" >
                  </form>
                </section>

                                <section class="all" name="thread">
                                  </section>
                              </section>
              
              <section class="tryit">
                <form name="jsRunExample">
                  <span class="ajaxLoader block jsEmptyTryit"></span>
                </form>
              </section>
                      </div>

          
        </section>                      
        
                  <h3 class="nameMethod">Destroy a User</h3>
        
        <section class="resource noActivity hasDescription">
          <hgroup>
            <h1 class="methodPost"><span>DELETE</span></h1>
            <h2>/user/{id}</h2>
            <a class="resourcePermalink" href="#delete-%2Fuser%2F%7Bid%7D" name="delete-%2Fuser%2F%7Bid%7D"><span> </span></a>
            <div class="toggle"></div>
                          <div class="commentsCount">
                <a href="#" class="commentsCountLink">Add Comment</a>
              </div>
                      </hgroup>

                                <article class="details">
                                          <div class="paramsTableWrap"><table class="paramsTable">
                <caption>Parameters</caption>
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Details</th>
                  </tr>
                </thead>
                <tbody>
                                      <tr>
                      <td>id</td>
                      <td><p>Numeric <code>id</code> of the User to display. Has example value.</p>
</td>
                      <td>number, required<br>example: <samp>1</samp>                                              </td>
                    </tr>
                                  </tbody>
              </table></div>
                          </article>
                    <div class="content">
            <nav class="switch">
              <ul>
                <a href="#example" class="active"><li><span>Example</span></li></a>
                                  <a href="#debugger"><li><span>Debugger</span></li></a>
                                                  <a href="#social"><li><span>Comments</span></li></a>
                                                  <a href="#tryit" class="jsTryitSwitcher"><li><span>Try It</span></li></a>
                              </ul>
            </nav>
            <section class="example">
                            <nav class="language">
                <form name="languageSwitcher">
                  <p>Show code sample</p>
                  <select>
                                          <option value="raw">none (raw data)</option>
                                          <option value="curl">curl</option>
                                          <option value="csharp">C#</option>
                                          <option value="javascript">javascript</option>
                                          <option value="nodejs">node.js</option>
                                          <option value="python">python</option>
                                          <option value="php">php</option>
                                          <option value="ruby">ruby</option>
                                          <option value="vb">Visual Basic</option>
                                      </select>
                </form>
              </nav>
                            <section class="code" id="generatedResourceCodeS1E6">                                                      <script>
window.docResources["generatedResourceCodeS1E6"] = (window.docResources["generatedResourceCodeS1E6"] || []).concat({
  "url": "/user/{id}",
  "method": "DELETE",
  "headers": {},
  "body": "digidiet/user/1",
  "parameters": {
    "id": 1
  }
});
</script>
                                                                    <p class="ioDesc">Response</p>
                  <section class="outgoingCall">
                    <pre class="outgoing outgoingHeaders"><code>200 (OK)</code></pre>
                    <pre class="outgoing"><code class=""></code></pre>
                  </section>
                                                                </section>
            </section>
                          <section class="debugger" data-resource-signature="DELETE /user/{id}"></section>
                            <section class="social">
                <nav class="switch"></nav>

                <section class="newPost">
                  <form action="/discussion/53404c1f62d9d40200009f66" method="post">
                     <textarea placeholder="Start a new thread…" name="comment"></textarea>
                     <div class="postControl">
                       <div class="postTools">
                         <input class="button blue big" type="submit" value="Submit">
                         <a class="cancel" href="#"><i class="icon-remove"></i> Cancel</a>
                       </div>
                     </div>
                     <input type="hidden" name="url" value="/user/{id}">
                     <input type="hidden" name="method" value="DELETE" >
                  </form>
                </section>

                                <section class="all" name="thread">
                                  </section>
                              </section>
              
              <section class="tryit">
                <form name="jsRunExample">
                  <span class="ajaxLoader block jsEmptyTryit"></span>
                </form>
              </section>
                      </div>

          
        </section>              </div>                  <div class="sameResourceGroup">
        
                  <h2 class="nameResource">Edit</h2>                      <div class="descriptionMethod"><p>Show the form for editing the specified user</p></div>
                  
                  <h3 class="nameMethod">Edit a User</h3>
        
        <section class="resource noActivity hasDescription">
          <hgroup>
            <h1 class="methodGet"><span>GET</span></h1>
            <h2>/user/{id}/edit</h2>
            <a class="resourcePermalink" href="#get-%2Fuser%2F%7Bid%7D%2Fedit" name="get-%2Fuser%2F%7Bid%7D%2Fedit"><span> </span></a>
            <div class="toggle"></div>
                          <div class="commentsCount">
                <a href="#" class="commentsCountLink">Add Comment</a>
              </div>
                      </hgroup>

                                <article class="details">
                                          <div class="paramsTableWrap"><table class="paramsTable">
                <caption>Parameters</caption>
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Details</th>
                  </tr>
                </thead>
                <tbody>
                                      <tr>
                      <td>id</td>
                      <td><p>Numeric <code>id</code> of the User to display. Has example value.</p>
</td>
                      <td>number, required<br>example: <samp>1</samp>                                              </td>
                    </tr>
                                  </tbody>
              </table></div>
                          </article>
                    <div class="content">
            <nav class="switch">
              <ul>
                <a href="#example" class="active"><li><span>Example</span></li></a>
                                  <a href="#debugger"><li><span>Debugger</span></li></a>
                                                  <a href="#social"><li><span>Comments</span></li></a>
                                                  <a href="#tryit" class="jsTryitSwitcher"><li><span>Try It</span></li></a>
                              </ul>
            </nav>
            <section class="example">
                            <nav class="language">
                <form name="languageSwitcher">
                  <p>Show code sample</p>
                  <select>
                                          <option value="raw">none (raw data)</option>
                                          <option value="curl">curl</option>
                                          <option value="csharp">C#</option>
                                          <option value="javascript">javascript</option>
                                          <option value="nodejs">node.js</option>
                                          <option value="python">python</option>
                                          <option value="php">php</option>
                                          <option value="ruby">ruby</option>
                                          <option value="vb">Visual Basic</option>
                                      </select>
                </form>
              </nav>
                            <section class="code" id="generatedResourceCodeS1E7">                                                      <script>
window.docResources["generatedResourceCodeS1E7"] = (window.docResources["generatedResourceCodeS1E7"] || []).concat({
  "url": "/user/{id}/edit",
  "method": "GET",
  "headers": {},
  "body": "/digidiet/user/1/edit",
  "parameters": {
    "id": 1
  }
});
</script>
                                                                    <p class="ioDesc">Response</p>
                  <section class="outgoingCall">
                    <pre class="outgoing outgoingHeaders"><code>200 (OK)</code></pre>
                    <pre class="outgoing"><code class="">makes view: digidiet/edit with user: 1</code></pre>
                  </section>
                                                                </section>
            </section>
                          <section class="debugger" data-resource-signature="GET /user/{id}/edit"></section>
                            <section class="social">
                <nav class="switch"></nav>

                <section class="newPost">
                  <form action="/discussion/53404c1f62d9d40200009f66" method="post">
                     <textarea placeholder="Start a new thread…" name="comment"></textarea>
                     <div class="postControl">
                       <div class="postTools">
                         <input class="button blue big" type="submit" value="Submit">
                         <a class="cancel" href="#"><i class="icon-remove"></i> Cancel</a>
                       </div>
                     </div>
                     <input type="hidden" name="url" value="/user/{id}/edit">
                     <input type="hidden" name="method" value="GET" >
                  </form>
                </section>

                                <section class="all" name="thread">
                                  </section>
                              </section>
              
              <section class="tryit">
                <form name="jsRunExample">
                  <span class="ajaxLoader block jsEmptyTryit"></span>
                </form>
              </section>
                      </div>

          </div>
        </section>      
          </div>
  
</div>

</div>


  
</div>

  <script>
    window.config = {
      "baseAjaxUrl": "http://docs.digidiet.apiary.io/"
    };
  </script>

  <script>
    window.jsLoginUrl    = "https://login.apiary.io/login?discussion=1&xhr_login=1";
    window.jsLoggedIn    = true;
    window.trafficSecret = "";
    window.runExampleIframeUrl = "http://digidiet.apiary.io/___APIARY_INTERNAL___/docs/run-button";
    window.tryItUrl    = "http://digidiet.apiary.io";
    window.mockserverUrl    = "http://digidiet.apiary-mock.com";
    window.loginUri      = "https://login.apiary.io/login";
    window.baseDomain    = "apiary.io";
    window.config.languages = {"raw":"none (raw data)","curl":"curl","csharp":"C#","javascript":"javascript","nodejs":"node.js","python":"python","php":"php","ruby":"ruby","vb":"Visual Basic"};
    window.previewHelpers = window.previewHelpers || {};
    window.previewHelpers.getContentTypeBrush = function (contentType) {
    if ((contentType != null ? contentType.slice(-5) : void 0) === '+json') {
      return 'language-javascript';
    }
    if ((contentType != null ? contentType.slice(-4) : void 0) === '+xml') {
      return 'language-markup';
    }
    switch (contentType) {
      case 'application/json':
        return 'language-javascript';
      case 'text/xml':
        return 'language-markup';
      case 'application/xml':
        return 'language-markup';
      default:
        return '';
    }
  };
    window.previewHelpers.apiUrl = window.previewHelpers.mockserverUrl = "http://digidiet.apiary-mock.com";

    window['examplesBundle'] = window['examplesBundle'] || function(data) {
      if (data && data.root) {
        $.getScript('https://apiary.a.ssl.fastly.net/assets/js/libs/ect-2096b613bc4615cd.js', function () {
          window.config.ectRender = window.ECT({ 'watch': false, 'cache': true, 'root': data.root, 'ext': '.html' });
          var expandedResource = $('section.resource.expanded section.code');
          if (expandedResource.length > 0) {
            window.renderExampleCodes(expandedResource);
          }
        });
      }
    };
  </script>
  <!-- uriTemplates expand support -->
  <script src="https://apiary.a.ssl.fastly.net/assets/js/libs/uritemplate-1eba3b195ac4ce24.js"></script>
  <!-- render-preview helpers -->
  <script src="https://apiary.a.ssl.fastly.net/assets/js/preview-334e019bcbcb71b0.js"></script>
  <!-- vitalize documentation -->
  <script src="https://apiary.a.ssl.fastly.net/assets/js/docs-ba4f5cfe914649a7.js"></script>
  <!-- templates in JSONP -->
  <script src="https://apiary.a.ssl.fastly.net/assets/js/examples.compiled.templates-3f46c65bc63e62ff.js?callback=examplesBundle"></script>
  <!-- inspect traffic w/ ease -->
  <script src="https://apiary.a.ssl.fastly.net/assets/js/traffic-1622bcfe990b61c8.js" data-multipart-container='.resource .debugger[data-resource-signature="#{method} #{url}"]'></script>
        <script src="https://apiary.a.ssl.fastly.net/assets/js/libs/tipsy-012f30b117d79e4b.js"></script>
  <script src="https://apiary.a.ssl.fastly.net/assets/components/diacritics-4a719096d14e9e72.js"></script>
  <script src="https://apiary.a.ssl.fastly.net/assets/components/jquery/token-field-9142c6ba619912c9.js"></script>
  <script src="https://apiary.a.ssl.fastly.net/assets/js/global-signedin-207bd003d034e82c.js"></script>
  <script src="https://apiary.a.ssl.fastly.net/assets/js/people-manager-529d66e028a1f674.js"></script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-18252923-1', 'apiary.io');
  ga('send', 'pageview');

</script>

<script type="text/javascript">
  /* <![CDATA[ */
    var google_conversion_id = 977730005;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
  /* ]]> */
 (function(d, t) {
  var g = d.createElement(t),
      s = d.getElementsByTagName(t)[0];
  g.async = true;
  g.src = ('https:' == location.protocol ? 'https://' : 'http://') + 'www.googleadservices.com/pagead/conversion.js';
  s.parentNode.insertBefore(g, s);
 })(document, 'script');
</script>
<!-- Mixpanel -->
<script type='text/javascript'>
  (function(e,b){if(!b.__SV){var a,f,i,g;window.mixpanel=b;a=e.createElement('script');a.type='text/javascript';a.async=!0;a.src=('https:'===e.location.protocol?'https:':'http:')+'//cdn.mxpnl.com/libs/mixpanel-2.2.min.js';f=e.getElementsByTagName('script')[0];f.parentNode.insertBefore(a,f);b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split('.');2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;'undefined'!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a='mixpanel';'mixpanel'!==d&&(a+='.'+d);b||(a+=' (stub)');return a};c.people.toString=function(){return c.toString(1)+'.people (stub)'};i='disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.increment people.append people.track_charge people.clear_charges people.delete_user'.split(' ');for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2}})(document,window.mixpanel||[]);
  mixpanel.init('5977dee08127554fce5543794fbafd90');
  mixpanel.set_config({"cookie_name":"apiaryMixpanel","store_google":false,"verbose":"","track_pageview":false,"debug":false,"upgrade":true});
  window.mixpanelDomain = "apiary.io"
</script>
<!-- /Mixpanel --><script id="IntercomSettingsScriptTag">
  var intercomSettings = {"app_id":"8dy7eohb","user_id":"534046bb62d9d40200009646","user_hash":"99fffb7019631479e19bec5c7a1796ee28d00d40","email":"mattvlaw@gmail.com","name":"mattvlaw ","created_at":1396721340,"custom_data":{"github":"mattvlaw","blueprint_size":3481,"subdomain":"digidiet, test1373"},"widget":{"activator":"#Intercom","use_counter":true}};
  intercomSettings.widget.activator_html=function (obj) {
        var unread_count;
        unread_count = obj.owner.store.get_unread_count();
        unread_count || (unread_count = 0);
        if (unread_count > 0) {
          return "" + obj.original_html + "<span class=\"unreadCounter\">" + unread_count + "</span>";
        } else {
          return obj.original_html;
        }
      }
</script>
<script>
  (function() {
    function async_load() {
      var s = document.createElement('script');
      s.type = 'text/javascript'; s.async = true;
      s.src = 'https://static.intercomcdn.com/intercom.v1.js';
      var x = document.getElementsByTagName('script')[0];
      x.parentNode.insertBefore(s, x);
    }
    if (window.attachEvent) {
      window.attachEvent('onload', async_load);
    } else {
      window.addEventListener('load', async_load, false);
    }
  })();
</script>


<script>
  if (!window.config) {
    window.config = {};
  }
  if (!window.config.user) {
    window.config.user = {};
  }
    window.config.user._id    = "534046bb62d9d40200009646";
  window.config.user.email  = "mattvlaw@gmail.com";
  window.config.user.name   = "mattvlaw ";
  </script>

<script src="https://apiary.a.ssl.fastly.net/assets/js/mixpanel-23a5e8e15f607050.js"></script>


</body>
</html>
