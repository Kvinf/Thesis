<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../yourproject.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Your Project</title>

    <style>
        .accordion-button::after {
            content:  none
        }
        .accordion-button{
            display: flex;
            flex-direction: column;
            align-items: start;
        }
    </style>
</head>

<body>
    <nav>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
    </nav>
    <div class="main">
        <header style=" display: flex; justify-content: center;">
            <form class="search-bar">
                <input type="text" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </header>

        <div class="project-name">
            <h2>Project Kevin</h2>
            <button class="title-button btn-dark" data-toggle="modal" data-target="#exampleModal" fdprocessedid="fke4lf">Edit</button>
        </div>

        <div class="project-description">
            <p><strong>Description</strong></p>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
        </div>

        <div class="accordion" id="accordionExample">

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" style ="content: none">
                    <div class ="http-button" style="background-color: green">GET</div>
                    Accordion Item #1
                </button>
              </h2>

              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <pre class="code-detail"><code style="color:white">dari sana
                        dapskdpaspdlapsdlpasasldpaslda
                        adasdasaddaisdj oajsd iiajisodjaoisj doiajs oijadoijsoaidjoaisdjsaoiasjoi
                        </code>
                    </pre>
                </div>
              </div>
            </div>

            <div class="accordion-item" >
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <div class ="http-button" style="background-color: yellow">POST</div>
                    Accordion Item #2
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <pre class="code-detail" ><code style="color:white">
                 dari sana
                dapskdpaspdlapsdlpasasldpaslda
                            adasdasaddaisdj oajsd iiajisodjaoisj doiajs oijadoijsoaidjoaisdjsaoiasjoi
                    </code></pre>.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <div class ="http-button" style="background-color: blue">PUT</div>
                    Accordion Item #3
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <pre class="code-detail"><code style="color:white">
                        dari sana
                        dapskdpaspdlapsdlpasasldpaslda
                        adasdasaddaisdj oajsd iiajisodjaoisj doiajs oijadoijsoaidjoaisdjsaoiasjoi
                    </code></pre>
                </div>
              </div>
            </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  <div class ="http-button" style="background-color: purple">PATCH</div>
                  Accordion Item #3
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                  <pre class="code-detail"><code style="color:white">
                      dari sana
                      dapskdpaspdlapsdlpasasldpaslda
                      adasdasaddaisdj oajsd iiajisodjaoisj doiajs oijadoijsoaidjoaisdjsaoiasjoi
                  </code></pre>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  <div class ="http-button" style="background-color: red">DELETE</div>
                  Accordion Item #3
              </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                  <pre class="code-detail"><code style="color:white">
                      dari sana
                      dapskdpaspdlapsdlpasasldpaslda
                      adasdasaddaisdj oajsd iiajisodjaoisj doiajs oijadoijsoaidjoaisdjsaoiasjoi
                  </code></pre>
              </div>
            </div>
          </div>

          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                  <div class ="http-button" style="background-color: darkgreen">HEAD</div>
                  Accordion Item #3
              </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                  <pre class="code-detail"><code style="color:white">
                      dari sana
                      dapskdpaspdlapsdlpasasldpaslda
                      adasdasaddaisdj oajsd iiajisodjaoisj doiajs oijadoijsoaidjoaisdjsaoiasjoi
                  </code></pre>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                  <div class ="http-button" style="background-color: pink">OPTIONS</div>
                  Accordion Item #3
              </button>
            </h2>
            <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                  <pre class="code-detail"><code style="color:white">
                      dari sana
                      dapskdpaspdlapsdlpasasldpaslda
                      adasdasaddaisdj oajsd iiajisodjaoisj doiajs oijadoijsoaidjoaisdjsaoiasjoi
                  </code></pre>
              </div>
            </div>
          </div>
        </div>

    </div>
</body>
</html>
