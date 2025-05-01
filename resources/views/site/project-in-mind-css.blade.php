<style>
    .mind-body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
        /* background-color: #F4F2FC; */
        font-family: Arial, sans-serif;
        padding: 20px;
        box-sizing: border-box;
        overflow: hidden;
    }
    .container-mind {
        display: flex;
        align-items: center;
        gap: 50px;
        flex-wrap: wrap;
        justify-content: center;
        transform: translateY(100px);
        opacity: 0;
        animation: fadeInUp 1s ease-out forwards;
    }
    @keyframes fadeInUp {
        from {
            transform: translateY(100px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    .text {
        font-size: 3.5rem;
        font-weight: bold;
        color: #191646;
        text-align: left;
    }
    .card {
        width: 450px;
        height: 250px;
        background: linear-gradient(135deg, #7B2FF7, #000000);
        border-radius: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.1);
    }
    .button {
        background-color: white;
        padding: 15px 25px;
        border-radius: 30px;
        font-size: 1.5rem;
        font-weight: bold;
        color: #191646;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 5px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
    }
    @media (max-width: 768px) {
        .container {
            flex-direction: column;
            text-align: center;
        }
        .text {
            font-size: 2.5rem;
            text-align: center;
        }
        .card {
            width: 90%;
            max-width: 400px;
        }
    }
</style>