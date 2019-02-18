<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://www.jsviews.com/download/jsrender.min.js"></script>
<script type="text/javascript" src="../../util.js"></script>

<script id="template" type="text/html">
    <tr>
        <td>{{:id}}</td>
        <td>{{:username}}</td>
        <td>{{:password}}</td>
        <td>{{:email}}</td>
        <td><a href="update.php?id={{:id}}">Edit</a></td>
    </tr>
</script>

<script>
    $(function () {
        $.getJSON('/api/user/list.php', function(data) {
            $("tbody").html($.templates("#template").render(data));
        })
    });
</script>

<h1>Users</h1>

<table>
    <thead>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>E-mail</th>
        <th>Actions</th>
    </thead>
    <tbody>
    </tbody>
</table>

<br />

<button type="button" onclick="goToUrl('create.php')">New User</button>