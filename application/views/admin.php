This is the admin page. <BR/>

In the admin page you are able to: <br/>



<ol>
    <li>Create a Blog</li>
    <li>Edit a Blog</li>
    <li>Delete a Blog</li>
</ol>

<div class="adminBtns">
    <a href="/a/news"/>News</a><a href="/a/anime"/>Anime</a><a href="/a/projects"/>Projects</a><a href="/a/streams"/>Streams</a>
</div>

<table cols=""" border="0">
    {categoryblog}
    {blogs}
    <tr>
        <td>{id}</td>
        <td>{date}</td>
        <td>{title}</td>
        <td></td>
    {/blogs}
</table>
{btnAdd}