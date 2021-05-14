# コーディングガイド

## ディレクトリ構造
タスクランナーの『Gulp』を使用しています。
ディレクトリ構造は以下になります。

```
gulp/
　├ _app/
　│　├ tasks/
　│　└ src/
　│　　　├ images/
　│　　　├ sass/
　│　　　└ templates/
　├ html/
　│　└ assets/
```

編集するファイルは`_app/`に存在し、gulpのタスクを実行していると自動的に`html/`にhtmlやcssファイルが出力されます。

`_app/src/`はGulpが監視する編集ファイルの配置ディレクトリで、`_app/tasks/`はGulpのプログラム内容です。tasksを編集して監視方法の変更が可能です。

また、Gulpの大本のプログラム`_app/gulpfile.babel.js`があり、このプログラムファイルが`_app/tasks/`のプログラムファイル郡を参照しています。

### 使用しているファイル
- `_app/gulpfile.babel.js`: Gulp本体のプログラムです。
- `_app/.prettierrc`: CSSファイルのコーディング整形プログラムPrettierrcの設定ファイルです。
- `_app/.stylelintignore`: CSS（Sass）のコーディングルールエラー検知用プログラムStyleLintの、検知除外設定ファイルです。
- `_app/.stylelintrc`: CSS（Sass）のコーディングルールエラー検知用プログラムStyleLintの、検知設定ファイルです。
- `_app/gulpfile.babel.js`: Gulp本体のプログラムです。
- `/.editorconfig`: エディターの設定を統一するためのファイルです。設定が反映されていない場合、このファイルを開くだけで大方設定が反映されます。（タブの空白orスペース、インデント数など）
- `/.gitignore`: Gitの管理除外設定ファイルです。

### ほぼ使用していないファイル
主に複数のJavaScriptを自動的に１つのファイルにまとめたり、別ブラウザでJavaScriptが動かなかった場合に使いますが、今回は使用していません。
- `_app/.babelrc`: Babelのルールファイルです。IEなど対応していないJavaScriptプログラムを対応するよう変換するのがBabelで、これのルール記述用ファイルになります。
- `_app/.eslintignore`: JavaScriptのコーディング内容を統一させるための、ESLintというプログラム用の除外設定ファイルです。
- `_app/.eslintrc.js`: JavaScriptのコーディング内容を統一させるための、ESLintというプログラム用の設定ファイルです。
- `_app/babel.config.js`: Babelの設定ファイルです。
- `_app/webpack.config.js`: 複数のJavaScriptを１つのファイルに纏めるwebpackの設定ファイルです。（Sassみたいなもの）

※使用するようにGulpプログラムを書いて対応することもできます。



## 開発環境の用意、Gulpの実行
予め、Node.jsがパソコンにインストールされていることを確認してください。
インストールされていない場合、公式HP『[Node.js](https://nodejs.org/ja/)』よりインストーラーをダウンロードしてインストールしてください。

ちなみに以下のコマンドはVisual Studio CodeやPhpStormであれば「NPMスクリプト」「Npm Scripts」のようなウィンドウを開き、クリックで実行可能です。


cdコマンドで`_app/`ディレクトリに移動します。
```
cd gulp/_app/
```

一番最初に以下のコマンドでNode.jsのモジュールをインストールしてください。`gulp/_app/node_modules/`ディレクトリが作成されて中にプログラムがインストールされます。（既にnode_modulesディレクトリがある場合は実行不要です）

Yarnがインストールされている場合：
```
npm run setup:yarn
```

Yarnがインストールされていない場合：
```
npm run setup:npm
```

以下コマンドを実行すると、自動的に[http://localhost:3000/](http://localhost:3000/)が開かれて開発環境が閲覧できます。
```
npm run dev
```

上記の開発環境コマンドの実行後、以下のようなエラーが表示されますが、Stylelintによる構文解析なので無視して大丈夫です。
```
src/sass/01_base/_setting/_setting.scss
  7:3  ✖  Expected indentation of 0 spaces     indentation
```

主にCSSのプロパティ順が違う、インデントの数が違う、といったエラー内容になります。このエラー検知のルールを変更したい場合、`gulp/_app/.stylelintrc`や`gulp/_app/.stylelintignore`を編集してください。
編集方法はStylelint公式ドキュメントを参照してください。

## 編集するファイルについて

### HTML
`gulp/_app/src/templates/`にある.pug（旧名: Jade）ファイルを編集するとHTMLになります。
公式サイトは[こちら](https://pugjs.org/api/getting-started.html)。

### CSS
`gulp/_app/src/sass/`にある.sassファイルを編集します。

ガイドラインなどは下記にある「命名規則について」、「Sassのディレクトリ構造やコーディングガイドラインについて」を参考にしてください。

### 画像
画像ファイルも`_app/`に配置すると自動的に`html/assets/images/`に軽量化して出力されますが、外部サービスのtinypngなどの方が優秀のようです。画像ファイルだけ手動で圧縮して`theme/assets/images/`に配置します。

### JavaScript
JavaScriptは出力先である`html/assets/js/`内のファイルを直接編集します。
面倒ですが、`theme/assets/js/`にも同様のファイルをコピーします。

※ただしGulpのプログラムを変更して、自動的にminifyやBabelでトランスパイルし、`html/`や`theme/`に自動出力させるGulpプログラムを作成した場合は、当ドキュメントを編集してJavaScriptも`_app/`内で編集するよう記載してください。


## 命名規則について
命名規則は[REMM](https://remm.qwiproject.com/)を使用しています。

## Sassのディレクトリ構造やコーディングガイドラインについて
[CROCSS](https://qiita.com/croco_works/items/28b5033448e54d2946c7)を使用しています。

CROCSSに関係する、HTMLのパーツ分類方法など概要は『[1段上のCSS設計・コーディングの概念図（HCDCモデル図）](https://qiita.com/croco_works/items/3f0f7407db5f263d2562)』に記載されています。

実際にHTMLでパーツ分類するときの考え方は『[脱・Atomic Design - HTML+CSSコーディングの粒度分類法（HTML Parts）](https://qiita.com/croco_works/items/e34d1b0c0e50b37031d7)』を参考にしています。

ディレクトリ名の決め方など詳細な方法は以下を参考にしています。
- [スコープ分類について（CROCSS詳細用-1）](https://qiita.com/croco_works/items/653c9f01c4c50a06e874)
- [データ分類について（CROCSS詳細用-2）](https://qiita.com/croco_works/items/661c7a8ba5c8fb72a29f)

※厳密なディレクトリ分けができるならやった方が良いですが、小規模なサイトなので分かる程度のディレクトリ分けで問題ありません。不明点があればissueでの質問大丈夫です。

※オンライン上で参照できるガイドラインがある、ということでCROCSS/HTML Partsを採用しました。今回が初めてなので厳密なディレクトリ分けや命名ができている自信はありません。分かるようなコーディングであれば問題ありません。

## Gitに関して
ネットで検索や書籍購入などで使用方法を覚えて当リポジトリにプッシュしてください。

## 質問や疑問点など
不明点があればGitHubのissueにてご質問ください。ドキュメントがおかしい、情報が足りない場合は修正します。

メンションを付けていただけると反応しやすいです。（反応がない場合、[TwitterのDM](https://twitter.com/s_ryone)やメール(ryoichi.shiohama@gmail.com)にてご連絡ださい。）
