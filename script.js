function vote(postId, type) {
    fetch(type + ".php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "post_id=" + postId
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById(type + "-" + postId).innerText = data;
    });
}
