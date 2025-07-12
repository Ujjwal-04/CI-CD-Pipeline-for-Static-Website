# 🚀 Static Website CI/CD with AWS S3 & GitHub Actions

This project demonstrates a **fully automated CI/CD pipeline** that deploys a static website (HTML/CSS/JS) to **Amazon S3** using **GitHub Actions**. Every time I push code to GitHub, the website is updated automatically.

---

## 🌐 Hosted URL

> 🟢 Resources were deleted to stay within AWS Free Tier.  
> 🔁 Can be redeployed anytime in minutes using the same repo and workflow.

---

## 🧰 Tech Stack

| Layer      | Tool/Service         |
|------------|----------------------|
| Frontend   | HTML, CSS            |
| Hosting    | Amazon S3 (Static Website Hosting) |
| CI/CD      | GitHub Actions       |
| Access     | IAM (programmatic user) |
| Secrets    | GitHub Repository Secrets |

---

## 📁 Project Structure

```
.
├── index.html
├── login.html
├── style.css
├── save.php
├── message.php
└── .github/
    └── workflows/
        └── deploy.yml
```

---

## ⚙️ Features

- ✅ Host static website on AWS S3
- ✅ Auto-deploy with every `git push`
- ✅ Secure secrets via GitHub
- ✅ Serverless + Free Tier friendly

---

## 🚦 GitHub Actions Workflow

```yaml
name: Deploy Static Site to S3

on:
  push:
    branches: [ main ]

jobs:
  deploy:
    runs-on: ubuntu-latest

    steps:
    - name: Checkout code
      uses: actions/checkout@v3

    - name: Configure AWS credentials
      uses: aws-actions/configure-aws-credentials@v2
      with:
        aws-access-key-id: ${{ secrets.AWS_ACCESS_KEY_ID }}
        aws-secret-access-key: ${{ secrets.AWS_SECRET_ACCESS_KEY }}
        aws-region: ${{ secrets.AWS_REGION }}

    - name: Sync files to S3
      run: |
        aws s3 sync . s3://${{ secrets.S3_BUCKET_NAME }} \
          --exclude ".git/*" \
          --exclude ".github/*" \
          --delete
```

---

## 🔐 GitHub Secrets Configured

| Name                     | Description                      |
|--------------------------|----------------------------------|
| `AWS_ACCESS_KEY_ID`      | IAM user programmatic access key |
| `AWS_SECRET_ACCESS_KEY`  | IAM user secret key              |
| `AWS_REGION`             | e.g. `us-east-1`                 |
| `S3_BUCKET_NAME`         | Your S3 bucket name              |

---

## 📸 Step-by-Step Setup with Screenshots

> All screenshots are placed in the `/Screenshots/` folder.

---

### ✅ Step 1: Create S3 Bucket

Created a new S3 bucket with static website hosting enabled.

📸 ![Step 1 - Create Bucket]
<img width="1919" height="980" alt="Screenshot 2025-07-12 172438" src="https://github.com/user-attachments/assets/26caf250-bc92-422f-9021-75fa1ddf3986" />
<img width="1919" height="977" alt="Screenshot 2025-07-12 172408" src="https://github.com/user-attachments/assets/347c1ff2-c0b2-4f12-b6ac-ef096bd4f722" />

---

### ✅ Step 2: Enable Static Website Hosting

Enabled hosting and set `index.html` as the default page.

📸 ![Step 2 - Website Hosting Config]
<img width="1919" height="984" alt="Screenshot 2025-07-12 172510" src="https://github.com/user-attachments/assets/aa3a9a92-a7ba-43f7-80b1-43d7c64916a3" />
<img width="1919" height="980" alt="Screenshot 2025-07-12 172519" src="https://github.com/user-attachments/assets/ac0f6a09-46a6-4ef2-9195-86f5c93cae24" />
<img width="1919" height="979" alt="Screenshot 2025-07-12 172635" src="https://github.com/user-attachments/assets/6dc18e2d-f51e-40d7-adbe-8ba891ea214b" />

---

### ✅ Step 3: Add Public Access Policy

Updated bucket policy to allow public read access for website visitors.

📸 ![Step 3 - Bucket Policy]
<img width="1919" height="983" alt="Screenshot 2025-07-12 172814" src="https://github.com/user-attachments/assets/3079aff4-1c5d-467c-ba1e-b4bc302bf925" />
<img width="1919" height="981" alt="Screenshot 2025-07-12 172843" src="https://github.com/user-attachments/assets/90a2e007-ffe4-46b6-b484-22e07cd1d760" />

---

### ✅ Step 4: Create IAM User for GitHub

Created a new IAM user with `AmazonS3FullAccess` and generated access keys.

📸 ![Step 4 - IAM User & Access Keys]
<img width="1919" height="976" alt="Screenshot 2025-07-12 173001" src="https://github.com/user-attachments/assets/fbd6cdc2-d579-483b-abc0-4051b69ef30e" />
<img width="1919" height="979" alt="Screenshot 2025-07-12 173757" src="https://github.com/user-attachments/assets/b445440b-bbf2-4e70-a842-739d3939fbc1" />
<img width="1919" height="983" alt="Screenshot 2025-07-12 173825" src="https://github.com/user-attachments/assets/5306062f-6956-43a4-93f8-8ee3b676ed94" />
<img width="1919" height="989" alt="Screenshot 2025-07-12 174054" src="https://github.com/user-attachments/assets/c1d56a0a-2791-4077-9f32-1646ef1f044f" />
<img width="1919" height="984" alt="Screenshot 2025-07-12 174219" src="https://github.com/user-attachments/assets/f1c43b3c-47f2-4734-b53b-10ef026cdde1" />
<img width="1919" height="982" alt="Screenshot 2025-07-12 174251" src="https://github.com/user-attachments/assets/4659b5e1-f251-41fd-b903-aca178edbd2c" />

---

### ✅ Step 5: Add GitHub Secrets

Stored AWS credentials and bucket name in GitHub repository secrets.

📸 ![Step 5 - GitHub Secrets]
<img width="1919" height="993" alt="Screenshot 2025-07-12 174439" src="https://github.com/user-attachments/assets/3e29c51c-755e-49dc-a8d2-8dda78052034" />
<img width="1919" height="979" alt="Screenshot 2025-07-12 174629" src="https://github.com/user-attachments/assets/1648c623-7bab-4f64-b86c-9797858ad9cd" />
<img width="1772" height="662" alt="Screenshot 2025-07-12 174819" src="https://github.com/user-attachments/assets/8cfa6b08-3097-436a-a852-4d27f482289c" />
<img width="1083" height="582" alt="Screenshot 2025-07-12 175018" src="https://github.com/user-attachments/assets/0f3476fa-b6f6-4bc3-ab6e-00347d95abe3" />

---

### ✅ Step 6: Create GitHub Actions Workflow

Added `deploy.yml` to `.github/workflows/` to handle CI/CD.

📸 ![Step 6 - Workflow Created]
<img width="1498" height="411" alt="Screenshot 2025-07-12 182733" src="https://github.com/user-attachments/assets/04d1c6d4-88cb-42d0-9061-520946c38e0f" />
<img width="1916" height="913" alt="Screenshot 2025-07-12 182752" src="https://github.com/user-attachments/assets/796c5e94-28d3-4a46-9652-8c05b6aa91ba" />

---

### ✅ Step 7: Push to GitHub → Auto Deploy to S3

Pushed code to `main` branch. GitHub Actions automatically deployed it to S3.

📸 ![Step 7 - Actions Success]
<img width="1146" height="555" alt="Screenshot 2025-07-12 182655" src="https://github.com/user-attachments/assets/b0e0ae06-75f8-4ff9-aef2-cd3b8cb7e69d" />
<img width="1919" height="979" alt="Screenshot 2025-07-12 180037" src="https://github.com/user-attachments/assets/f820ba9e-84f5-4b7f-bd64-15fc8e5cf382" />

---

### ✅ Step 8: Live Website Running on S3

Accessed the live URL served from the S3 static hosting endpoint.

📸 ![Step 8 - Website Preview]
<img width="1919" height="983" alt="Screenshot 2025-07-12 172906" src="https://github.com/user-attachments/assets/364b5900-f081-40e7-aae3-5c2eb8201417" />
<img width="1919" height="1035" alt="Screenshot 2025-07-12 180050" src="https://github.com/user-attachments/assets/4a30a205-4a61-42d5-add9-86a2f1b20c08" />

---

## 🧠 What I Learned

- Hosting and configuring S3 for static websites
- Creating IAM users for programmatic access
- Securing deployment credentials using GitHub Secrets
- Building GitHub Actions CI/CD pipelines
- Thinking like a DevOps engineer

---

## 💡 Use Cases

- Personal portfolio sites
- Resume websites
- Landing pages or project demos
- Any frontend site that doesn’t require a backend

---

## 🚦 Project Status

- ✅ CI/CD works automatically on push
- 🛑 S3 + IAM resources were deleted to avoid billing
- 🧑‍💻 Can be fully redeployed in minutes using this repo

---

## 🧑‍💻 Author

**UJJWAL WADHAI**  

🔗 [GitHub](https://github.com/Ujjwal-04)
🔗 [LinkedIn](www.linkedin.com/in/ujjwal-wadhai)

---
