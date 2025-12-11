<style>
    .upload-wrapper {
    width: 100%;
    max-width: 450px;
    margin: 50px auto;
    padding: 20px;
}

.upload-box {
    background: white;
    padding: 30px 20px;
    border: 2px dashed #a6b5cb;
    border-radius: 18px;
    text-align: center;
    transition: 0.25s ease;
    cursor: pointer;
    box-shadow: 0 8px 18px rgba(0,0,0,0.05);
}

.upload-box:hover {
    border-color: #4e7fff;
    background: #f0f6ff;
}

.upload-box.active {
    border-color: #2b63ff;
    background: #e7f0ff;
}

.upload-box {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.upload-lottie {
    width: 300px;
    height: auto;
    margin-bottom: 10px;
}

.upload-box h3 {
    font-size: 20px;
    margin-bottom: 5px;
    font-weight: 600;
    color: #2c3e50;
}

.upload-box p {
    font-size: 14px;
    color: #6c7a91;
}

.file-preview {
    margin-top: 15px;
    padding: 15px;
    background: #ffffff;
    border-radius: 12px;
    font-size: 15px;
    color: #333;
    box-shadow: 0 4px 12px rgba(0,0,0,0.06);
    display: none;
}

.upload-button {
    margin-top: 20px;
    width: 100%;
    padding: 12px;
    background: #4b7cff;
    color: white;
    font-size: 16px;
    font-weight: 600;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    transition: 0.3s;
}

.upload-button:hover {
    background: #345eea;
}

/* Background lembut untuk tab Import */
.import-section {
    padding: 25px;
    background: linear-gradient(135deg, #f5f9ff, #eef3ff);
    border-radius: 20px;
}

/* Card upload agar tampak menonjol */
.upload-card {
    background: #ffffff;
    padding: 30px;
    border-radius: 20px;
    max-width: 500px;
    width: 100%;
    box-shadow: 0 12px 25px rgba(0,0,0,0.07);
}

/* Header */
.import-header h3 {
    font-size: 26px;
}

.import-header p {
    font-size: 14px;
}

/* Lottie size improved */
.upload-lottie {
    width: 320px;
    height: auto;
    margin-bottom: 15px;
}

/* Hover glow */
.upload-box:hover {
    box-shadow: 0 0 20px rgba(78,127,255,0.25);
}

/* Smooth transition */
.upload-card,
.upload-box {
    transition: 0.25s ease;
}

</style>