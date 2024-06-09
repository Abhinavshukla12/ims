<?= $this->extend('ImsViews/layout/default') ?>

<?= $this->section('content') ?>
<!-- Settings Page Content -->
<div class="content">
    <!-- Flex container for side-by-side layout -->
    <div class="settings-container">
        <!-- Normal Settings Section -->
        <div class="section normal-settings">
            <h2>Other Settings</h2>
            <!-- Add your normal settings content here -->
        </div>
        
        <!-- User Settings Section -->
        <div class="section user-settings">
            <h2>User Settings</h2>
            <!-- User settings buttons with icons -->
            <div class="settings-button-container">
                <button class="settings-button" data-action="changeProfilePhoto">
                    <i class="fas fa-user-circle"></i> Change Profile Photo
                </button>
                <button class="settings-button" data-action="changePassword">
                    <i class="fas fa-key"></i> Change Password
                </button>
                <button class="settings-button" data-action="logout">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </div>
        </div>
    </div>
</div>

<script type="module">
    // JavaScript module to handle button actions
    document.addEventListener('DOMContentLoaded', () => {
        const buttons = document.querySelectorAll('.settings-button');

        buttons.forEach(button => {
            button.addEventListener('click', async () => {
                const action = button.getAttribute('data-action');
                if (actionHandlers[action]) {
                    await actionHandlers[action]();
                }
            });
        });
    });

    const actionHandlers = {
        async changeProfilePhoto() {
            // Logic to change profile photo
            await fetch('/change-profile-photo', { method: 'POST' });
            alert('Profile photo changed');
        },
        async changePassword() {
            // Logic to change password
            await fetch('/change-password', { method: 'POST' });
            alert('Password changed');
        },
        async logout() {
            // Logic to log out the user
            await fetch('/logout', { method: 'POST' });
            alert('Logged out');
        }
    };
</script>

<style>
    .settings-container {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .section {
        flex: 1;
        min-width: 300px;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        background-color: #f9f9f9;
    }

    .user-settings {
        flex: 2;
    }

    .settings-button-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .settings-button {
        padding: 15px 20px;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        color: white;
        font-size: 16px;
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        transition: background-color 0.3s, box-shadow 0.3s;
    }

    .settings-button:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .settings-button i {
        font-size: 20px;
    }
</style>

<?= $this->endSection() ?>
