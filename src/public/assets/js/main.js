$(document).ready(function() {
    // Fetch and display tags
    $.ajax({
        url: '/PawAlert/FePA/src/public/tags',
        method: 'GET',
        success: function(tags) {
            tags = JSON.parse(tags);
            let tagsList = $('#tags-list');
            tags.forEach(tag => {
                tagsList.append(`
                    <label>
                        <input type="radio" name="tags" value="${tag.id}"> ${tag.name}
                    </label>
                    <br>
                `);
            });
        },
        error: function(error) {
            console.log('Error fetching tags:', error);
        }
    });

    // Fetch and display posts
    function fetchPosts(tagId = null) {
        $.ajax({
            url: '/PawAlert/FePA/src/public/posts',
            method: 'GET',
            data: { tagId: tagId },
            success: function(posts) {
                posts = JSON.parse(posts);
                let postsSection = $('#posts-section');
                postsSection.empty();
                posts.forEach(post => {
                    postsSection.append(`
                        <div class="post">
                            <h3 class="post-title">${post.title}</h3>
                            <p class="post-description">${post.description}</p>
                            <p class="post-tags">${post.tags}</p>
                        </div>
                    `);
                });
            },
            error: function(error) {
                console.log('Error fetching posts:', error);
            }
        });
    }

    // Initial fetch of all posts
    fetchPosts();

    // Filter posts by selected tag
    $('#filter-form').on('submit', function(e) {
        e.preventDefault();
        let selectedTag = $('input[name="tags"]:checked').val();
        fetchPosts(selectedTag ? selectedTag : null);
    });
});
