<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Async and await</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <section class="py-4">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div id="app"></div>
            </div>
        </div>
    </section>

    <script>
        const getArticles = async() => {
            try {
                const resp = await fetch("http://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=YOUR_API_KEY")
                const data = await resp.json()

                data.articles.map((obj) => {
                    let articleStructure = /*html*/
                    `
                    <div class="col-12 col-md-6">
                        <article class="panel p-3">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <figure><img class="img-fluid" src="${obj.urlToImage}" /></figure>
                                </div>
                                <div class="col">
                                    <h3>${obj.title}</h3>
                                    <div id="articleDescription">${obj.content}</div>
                                    <a href="${obj.url}">Full Article</a>
                                </div>
                        </article>
                    </div>
                    `
                    document.getElementById('app').parentElement.innerHTML += articleStructure
                })
                document.getElementById('app').remove()
            } catch (error) {
                console.log(error);
            }
        }
        getArticles()
    </script>
</body>
</html>