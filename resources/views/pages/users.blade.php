<h2>Users</h2>
<p>Here will be user data from API.</p>
<button onclick="fetchUsers()">Load Users</button>
<ul id="user-list"></ul>

<script>
  function fetchUsers() {
    $.ajax({
      url: "/api/users",
      method: "GET",
      success: function (data) {
        let html = '';
        data.forEach(user => {
          html += `<li>${user.name} (${user.email})</li>`;
        });
        $('#user-list').html(html);
      }
    });
  }
</script>
