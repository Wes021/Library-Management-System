<style>
    .alert {
        padding: 15px;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease-in-out;
        max-width: 90%;
        margin: 10px auto;
        flex-wrap: wrap;
    }
    
    .alert-success {
        background-color: #d4edda;
        border-left: 5px solid #28a745;
        color: #155724;
    }
    
    .alert-danger {
        background-color: #f8d7da;
        border-left: 5px solid #dc3545;
        color: #721c24;
    }
    
    .alert .close {
        background: none;
        border: none;
        font-size: 18px;
        font-weight: bold;
        color: inherit;
        cursor: pointer;
        transition: color 0.2s ease-in-out;
    }
    
    .alert .close:hover {
        color: #000;
    }
</style>

@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <strong>Success!</strong> {{ session('success') }}
        <button type="button" class="close" onclick="this.parentElement.style.display='none';">
            &times;
        </button>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong>Error!</strong> {{ session('error') }}
        <button type="button" class="close" onclick="this.parentElement.style.display='none';">
            &times;
        </button>
    </div>
@endif
