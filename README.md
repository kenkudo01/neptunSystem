# 🎓 Neptun System – Laravel Learning Management Platform

Neptun System は、**学生と教員がオンラインで授業を管理できる学習管理プラットフォーム（LMS）**として自主開発した Web アプリケーションです。  
コース管理、課題管理、提出物、ユーザー権限など、教育現場に必要な機能を一通り備えています。

## ✨ 主な特徴

### 🔐 認証・ユーザー管理
- ログイン / 新規登録  
- 学生 / 教員アカウントを切り替えて利用可能  
- 権限に応じて異なるメニューやホーム画面を表示  
- ログアウト機能  

## 👨‍🏫 教員向け機能（Teacher Dashboard）

### 📘 コース管理
- コースの新規作成  
- コース内容の編集  
- コースの削除  
- コース詳細（説明、受講者、課題一覧）  

### 📝 課題管理
- 課題の新規作成  
- 課題の編集  
- 課題詳細の表示  
- コース別・全体の課題一覧  

### 📬 提出物（Solution）管理
- 学生の提出物一覧  
- 詳細確認  
- 採点およびコメント入力  

## 🎓 学生向け機能（Student Dashboard）

### 🧭 学習メニュー
- 登録中のコース一覧  
- 未提出課題の確認  

### 📘 コース受講管理
- コースの履修登録  
- 履修解除  
- コース詳細の閲覧（課題一覧、説明、教員情報など）  

### 📝 課題提出
- 課題一覧の確認  
- 課題詳細ページ  
- 提出フォームからの送信（テキストベース or その他形式）  

## 🎨 デザイン / UI

- シンプルで直感的に使えるインターフェイス  
- Blade テンプレートをベースに構築  
- Bootstrap によるレスポンシブデザイン  

## 🛠️ 技術スタック

- **Laravel 10**
- **Blade Templates**
- **Bootstrap**
- **SQLite / MySQL 対応**
- **Seeder によるサンプルデータ投入**
- **Role-based Access Control（教員/学生の切り替え）**

## 🚀 セットアップ手順

```bash
git clone https://github.com/kenkudo01/neptunSystem.git
cd neptunSystem
composer install

cp .env.example .env   # Windows: copy .env.example .env
php artisan key:generate

php artisan migrate --seed
php artisan serve
```

アクセス: http://localhost:8000

## 📦 初期データ（Seeder）

開発中すぐ動作確認できるよう、以下のサンプルデータが自動生成されます。

- 教員アカウント  
- 学生アカウント  
- コース（複数）  
- 課題（複数）  
- 学生の提出物（自動生成）

## 🎯 プロジェクトの目的

Neptun System は、  
**「教育のワークフローをオンラインで完結できるシンプルな LMS を作りたい」**  
というコンセプトで自主開発しました。

- コース設計  
- 課題の配布 / 提出  
- 提出物の管理  
- 教員と学生の権限分離  
- UI設計 / データモデル構築 / Webアプリの全体設計

これらを一貫して実装し、Laravel を用いた Web アプリケーション開発を実践的に学ぶためのプロジェクトです。

## 📸 スクリーンショット

例:
```md
![Main](docs/images/main.png)
![Teacher Home](docs/images/teacher-home.png)
```
