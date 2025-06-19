<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Konfirmasi Pendaftaran Pasien - RuliKlinik</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500&display=swap');
        
        body {
            font-family: 'Roboto', sans-serif;
            line-height: 1.6;
            color: #333333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f7fafc;
        }
        
        .email-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-top: 20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 20px;
        }
        
        .logo {
            color: #2d3748;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .greeting {
            font-size: 18px;
            font-weight: 500;
            color: #2d3748;
            margin-bottom: 25px;
        }
        
        .confirmation-message {
            background-color: #f0fff4;
            border-left: 4px solid #48bb78;
            padding: 15px;
            margin-bottom: 25px;
            border-radius: 0 4px 4px 0;
        }
        
        .details-card {
            background-color: #f8fafc;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 25px;
            border: 1px solid #e2e8f0;
        }
        
        .details-title {
            font-size: 16px;
            font-weight: 500;
            color: #2d3748;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .details-title svg {
            margin-right: 10px;
        }
        
        .detail-item {
            margin-bottom: 12px;
            display: flex;
            align-items: baseline;
        }
        
        .detail-label {
            font-weight: 500;
            width: 140px;
            color: #4a5568;
        }
        
        .detail-value {
            font-weight: 400;
            color: #2d3748;
            flex-grow: 1;
        }
        
        .queue-number {
            background-color: #ebf8ff;
            color: #3182ce;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: 700;
            display: inline-block;
            font-size: 14px;
        }
        
        .reminder {
            background-color: #fffaf0;
            border-left: 4px solid #ed8936;
            padding: 15px;
            margin: 25px 0;
            border-radius: 0 4px 4px 0;
            font-size: 15px;
            line-height: 1.5;
        }
        
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #718096;
            font-size: 14px;
            border-top: 1px solid #e2e8f0;
            padding-top: 20px;
            line-height: 1.5;
        }
        
        .signature {
            font-weight: 500;
            margin-top: 25px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <div class="logo">Ruli Klinik</div>
            <div style="color: #718096; font-size: 14px;">Pelayanan Kesehatan Terbaik untuk Anda</div>
        </div>
        
        <div class="greeting">Halo {{ $pasien->nama_pasien }},</div>
        
        <div class="confirmation-message">
            Terima kasih telah mendaftar di Klinik Kami. Pendaftaran Anda telah berhasil kami terima.
        </div>
        
        <div class="details-card">
            <div class="details-title">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#4A5568" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Detail Pendaftaran Anda
            </div>
            
            <div class="detail-item">
                <div class="detail-label">Nama Lengkap</div>
                <div class="detail-value">: {{ $pasien->nama_pasien }}</div>
            </div>
            
            <div class="detail-item">
                <div class="detail-label">Alamat Email</div>
                <div class="detail-value">: {{ $pasien->email_pasien }}</div>
            </div>
            
            <div class="detail-item">
                <div class="detail-label">Nomor Antrean</div>
                <div class="detail-value">: <span class="queue-number">{{ $pasien->nomor_antrean }}</span></div>
            </div>
            
            <div class="detail-item">
                <div class="detail-label">Tanggal</div>
                <div class="detail-value">: {{ \Carbon\Carbon::parse($pasien->tanggal)->format('d M Y') }}</div>
            </div>
            
            <div class="detail-item">
                <div class="detail-label">Jam Praktek</div>
                <div class="detail-value">: {{ $pasien->jam }}</div>
            </div>
        </div>
        
        
        
        <div class="signature">
            Salam sehat,<br>
            <strong>Tim Ruli Klinik</strong>
        </div>
        
        <div class="footer">
            © {{ date('Y') }} Ruli Klinik. All rights reserved.<br>
            Jl. Kesehatan No. 123, Depok | (021) 12345678
        </div>
    </div>
</body>
</html>