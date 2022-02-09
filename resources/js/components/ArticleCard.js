import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';

const ArticleCard = () => {
    const [ articles, setArticles ] = useState([]);
    useEffect(() => {
        fetch('/api/articles')
        .then((res) => res.json())
        .then((resJson) => {
            setArticles(resJson.data)
        })
        .catch((error) => console.log(error))
    }, []);

    return (
        <>
        {
            articles.map((article, key) => {
                console.log(article)
                return (
                    <div className="col col-4 mt-3" key={key}>
                        <div className="card text-center">
                            <div className="card-header">
                                { article.judul }
                            </div>
                            <div className="card-body">
                                <p className="card-text">{ article.content }</p>
                                <a href={`/articles/${article.id}`} className="btn btn-primary">Read more...</a>
                            </div>
                            <div className="card-footer text-muted">
                                { article.user.name } || { article.created_at }
                            </div>
                        </div>
                    </div>
                )
            })
        }
        </>
    )

}

export default ArticleCard;

if (document.getElementById("articles")) {
    ReactDOM.render(<ArticleCard />, document.getElementById('articles'));
}
