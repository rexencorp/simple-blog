import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';

const FormComment = () => {
    return (
        <>
        </>
    )
}

const CommentCard = (props) => {
    const { data } = props;
    return (
        <div className={`card mt-4 ${data.comment.status == 1 ? 'bg-warning' : '' }`}>
        <div className="card-body">
            <h5>{ data.comment.user.name }</h5>
            <p>{ data.comment.comment }</p>
            <button type="button" class="btn btn-primary ml-4" data-bs-toggle="modal" data-bs-target="#addReply-{{ $comment->id }}">Reply</button>
        </div>
    </div>
    )
}

const Comment = (props) => {
    const { data } = props;
    const [comments, setComments] = useState([]);
    useEffect(() => {
        fetch('/api/comments' + data.articleId)
        .then((res) => res.json())
        .then((resJson) => {
            console.log(resJson)
            setComments(resJson.data)
        })
        .catch((error) => console.log(error))
    }, []);

    return (
        <>
        <FormComment />
            {
             comments.map((comment, key) => {
                 return (
                     <CommentCard type="normal" data={comment} />
                 )
             })
            }
        </>
    )
}

export default Comment;

if (document.getElementById("comment-list")) {
    let data = document.getElementById("comment-list").dataset;
    console.log(data)
    ReactDOM.render(<Comment data={data} />, document.getElementById('comment-list'));    
}
