-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2022 at 06:23 AM
-- Server version: 5.7.33
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuliah_tb_smartweb_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Programming', 'programming', 'ada desc', '2022-03-22 23:03:11', '2022-03-24 00:30:43'),
(2, 'Web Design', 'web-design', NULL, '2022-03-22 23:03:11', '2022-03-22 23:03:11'),
(3, 'Personal', 'personal', NULL, '2022-03-22 23:03:11', '2022-03-22 23:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_08_005209_create_categories_table', 1),
(5, '2021_08_08_130238_create_posts_table', 1),
(6, '2022_03_22_042437_create_comments_table', 1),
(7, '2022_03_23_021420_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_status` tinyint(1) NOT NULL,
  `comment_status` tinyint(1) NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `image`, `excerpt`, `body`, `publish_status`, `comment_status`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Voluptatem dolor minima neque.', 'iste-ratione-eveniet-maiores-hic', NULL, 'Minus magnam delectus explicabo odio soluta similique autem eum molestias aspernatur eius.', '<p>Aut et omnis natus ut consequatur explicabo. Facere quod rerum natus sed aut repellendus et. Eaque sed quas veniam et ad fugiat ut. Aut nihil sed vitae cupiditate odit porro consequatur.</p><p>Nostrum quibusdam ut voluptas ut. Totam et est atque voluptate. Aut est quod voluptatem soluta.</p><p>Accusamus sapiente velit harum dolorum quia sunt est. Eum est debitis aut nesciunt. Nulla tempora et aut consequuntur est quod.</p><p>Ipsa expedita error quibusdam reiciendis reprehenderit architecto. Et non optio aut dolorum veniam vitae. Iste illo et iusto enim saepe voluptatem.</p><p>Distinctio voluptatem quis incidunt velit. Soluta reprehenderit et est. Ut est esse et laborum dolor. Quia accusantium ad temporibus quibusdam est enim molestias.</p><p>Iusto dolorem id ut. Magnam quos aut unde pariatur sed quia neque perferendis.</p><p>Distinctio labore hic et totam reiciendis. Doloribus necessitatibus nisi voluptatem voluptatum. Id unde tenetur sit nulla facere. Eveniet quasi nemo et eius eaque rerum labore atque. Dolorem et sit voluptas molestiae autem saepe aut quam.</p><p>Sapiente eaque eum qui. Quaerat enim molestiae quidem id. Impedit magni et quae dolores omnis.</p>', 1, 1, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-22 23:03:12'),
(2, 2, 2, 'Et aut et et.', 'harum-temporibus-commodi-eaque-est-repudiandae-quia', NULL, 'Dolor exercitationem qui similique vitae exercitationem aut quaerat sit sed qui alias aperiam ipsa tempore enim rem tempore id reprehenderit facere consectetur.', '<p>Suscipit harum quisquam distinctio voluptates harum. Aperiam ab voluptas error itaque qui laudantium qui. Voluptas officia aspernatur itaque qui consequuntur nam doloribus. Consequatur eos deleniti provident similique quasi alias.</p><p>Quia et voluptatem non harum earum quas. Consequatur qui eum enim autem quidem maiores. Corrupti eaque aut magnam laudantium soluta dignissimos quo cupiditate. Totam voluptatibus et soluta sint sequi.</p><p>Sit ipsam corrupti numquam ut perspiciatis eveniet nam. Aut dignissimos ipsam ea unde quas et. Cum et rerum vero voluptates tenetur qui commodi.</p><p>Quia magnam unde quod. Maxime est quas est esse blanditiis. Asperiores dolorem quaerat ea dolorem est rerum delectus. Suscipit consequatur est vero optio qui qui pariatur.</p><p>Commodi quia commodi consectetur dolore. Voluptatem ipsum magnam rerum sed amet quia repellendus. Voluptas enim quis odit magnam. Tempore ex quam accusantium.</p>', 1, 1, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-22 23:03:12'),
(3, 2, 2, 'Ducimus tempora adipisci qui dolorum velit cumque tenetur labore dolor libero.', 'voluptas-non-nostrum-voluptatem-mollitia-amet-itaque-voluptate', NULL, 'Incidunt animi dolorem amet voluptas nemo consequatur provident fugiat possimus cumque vel voluptates aspernatur ad quos cum non.', '<p>Ut ut saepe et expedita recusandae et mollitia. Est sed velit consequatur facilis cum tenetur accusamus.</p><p>Non dolor quia et commodi voluptatem. Quas ut ab autem et rem sit commodi libero. Non excepturi velit ipsam.</p><p>Modi labore veniam odio non hic iure id ullam. Quia cumque unde omnis vero et labore. Ipsum cumque aut molestias vel. Deserunt temporibus animi consequuntur ut eligendi autem.</p><p>Incidunt voluptatem dolores amet sapiente magnam. Adipisci voluptatem velit aut consequatur. Facere fugiat maxime praesentium est eligendi. Non dicta eius fugit omnis sequi animi error.</p><p>Numquam dolores sit quod omnis suscipit. Est ipsam blanditiis sed aut. Cum cum soluta doloribus rerum dolorem sint sit magnam.</p><p>Iure occaecati quas maiores. Inventore sequi est nisi adipisci saepe et fuga quidem. Ex ad vitae aspernatur debitis alias.</p><p>In fugit perspiciatis ipsum doloremque sapiente quo. Repellat nesciunt architecto ex molestiae sed. Quia aut ad accusamus consequatur est sed.</p><p>Quia enim qui dolorum impedit. Architecto quo vel eum aliquid. Est eum ut accusantium unde ab aut cumque iure. Dolorum unde facilis voluptates consequatur praesentium nisi veniam ut.</p>', 1, 1, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-22 23:03:12'),
(4, 1, 2, 'Labore sit rerum deserunt.', 'id-et-ex-deserunt', NULL, 'Voluptatibus velit et veritatis id dolores temporibus corrupti labore repudiandae recusandae sed rerum illo ipsam eos in corrupti.', '<p>Ut ut vitae qui pariatur aspernatur repudiandae. Voluptas explicabo aut est quasi dicta. Dolorem voluptatem voluptatum dolores.</p><p>Voluptatem aspernatur harum repellat delectus asperiores autem. Perferendis neque eaque aperiam molestiae repellat.</p><p>Vel qui non saepe dolor et magnam. Cumque corrupti et est consequatur id autem ut. Labore corrupti ut nisi nesciunt est laudantium a. Recusandae quas inventore quia illum repellendus aut quos.</p><p>Autem voluptate esse optio cumque. Velit quia eaque ut facere repellat architecto. Unde maiores ipsa sit ducimus adipisci voluptate. Et voluptas fugiat consequuntur expedita est.</p><p>Aliquam doloribus et sit dolore et. Sapiente consequuntur maxime et nemo nostrum minima assumenda ut. Ullam similique nam maiores hic aut.</p><p>Tempora vel delectus quo necessitatibus voluptas et. Consectetur harum vel delectus voluptate eos sed.</p><p>Nobis sunt id ipsum maiores. Molestiae rerum impedit molestiae nobis rem eaque dolorem.</p><p>Porro repudiandae sapiente omnis sed similique veritatis. Doloribus nihil molestiae aut quidem ut ipsum. Quidem dolore cupiditate velit.</p><p>Quia debitis voluptatem magni qui. Est placeat dolores voluptatem occaecati. Laudantium atque corrupti hic sit commodi autem. Sunt incidunt sit quo similique ut illum molestiae.</p><p>Facilis aut nobis est hic. Magnam amet commodi eligendi et porro. Vel quaerat sunt id accusamus.</p>', 1, 1, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-22 23:03:12'),
(5, 1, 2, 'Qui ad accusamus suscipit officia magnam.', 'maxime-est-nobis-molestiae-dolor', NULL, 'Ipsum dicta rerum dolores nostrum veritatis voluptatem ab odit vel ut tenetur sit qui omnis.', '<p>Sapiente dignissimos autem fugit voluptas cupiditate voluptas quia. Fugit voluptas id voluptates harum praesentium perferendis rerum. Expedita necessitatibus a delectus quia unde. Molestiae nihil suscipit est consequatur et similique laboriosam.</p><p>Asperiores earum tenetur amet suscipit. Et dolorum ut eveniet ipsum neque dolores voluptas et. Delectus maiores suscipit voluptatem accusamus vero.</p><p>Quia reiciendis rerum eveniet ipsum quis nulla facilis eum. Repellat praesentium dolorem et ullam enim expedita ullam. Nihil minima quae nemo ipsam facere rerum numquam. Tempore deleniti deleniti eveniet in laborum placeat sed.</p><p>Sint dolorem quo exercitationem pariatur quasi. Est maxime dolorem aspernatur alias rem in architecto dolores. Aperiam corrupti dolorem autem recusandae ut.</p><p>Qui sunt aut repellat est distinctio similique. Tempore quis inventore atque autem quia.</p>', 1, 1, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-22 23:03:12'),
(6, 2, 1, 'Ut molestias voluptatem corrupti porro qui consequatur ipsumo', 'ut-molestias-voluptatem-corrupti-porro-qui-consequatur-ipsumo', 'post-images/EZ1B0nfOd61niBEa3jsF0WuLAgA0NLLSr9IePaX0.jpg', 'Et quaerat architecto veritatis omnis distinctio dolor. Et ut et tempora quis a. Voluptas qui ut ips...', '<div>Et quaerat architecto veritatis omnis distinctio dolor. Et ut et tempora quis a. Voluptas qui ut ipsum vitae sed esse in. Qui est id ipsum. Excepturi in aut est magni quis voluptatem laboriosam.<br><br></div><div>Et aliquam eveniet eaque et dolorem corrupti nisi sunt. Ullam hic et possimus delectus consequuntur dolor. Culpa laboriosam voluptatibus voluptatem laudantium incidunt et non. Adipisci ut autem velit qui. Consequatur et voluptatem quaerat voluptatibus animi.<br><br></div><div>Qui similique aliquid sunt maxime et totam. Reprehenderit ex maiores vitae. Fugit inventore itaque quia quis officia est dolores. Perferendis eos corporis exercitationem. Voluptatem dignissimos earum placeat.<br><br></div><div>Magni fugiat eos doloremque dolorem reiciendis aut. Et nisi quo aspernatur est occaecati modi. Tenetur pariatur officia vero suscipit ut. Quidem velit illum eaque autem aut et.<br><br></div><div>Perspiciatis fugiat nulla voluptas vel officia expedita molestiae. Qui quo magnam nisi autem consequatur. Et dolores culpa deserunt dolor et qui velit.<br><br></div><div>Tempora aspernatur et suscipit officiis possimus. Et dignissimos ab explicabo ut. Labore adipisci et cumque sint dolorem placeat. Illum est saepe ex autem ipsum rerum quo.<br><br></div><div>Non laborum sequi nobis ullam beatae. Quas omnis voluptas consectetur. Dolore id nostrum sit laboriosam. Laudantium ea maiores labore.<br><br></div><div>Repudiandae alias enim omnis saepe consequatur cumque. Perspiciatis reiciendis dicta est eveniet velit vitae minima sed. Tenetur et velit voluptatibus corrupti quibusdam quidem. Mollitia est fugiat itaque nihil doloribus est eum.<br><br>test coba<br><br></div>', 0, 0, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-24 05:00:45'),
(7, 1, 2, 'Ut expedita ut quaerat aperiam maiores.', 'earum-minima-atque-sunt', NULL, 'Qui magnam porro consequatur incidunt molestias sed qui excepturi rerum sit recusandae exercitationem nihil dolorem ut rerum earum sed eos iure quaerat.', '<p>Aut autem esse blanditiis error. Aut deserunt voluptates iure beatae aut est. Magni quibusdam accusantium error deserunt consequatur saepe in. Cum in ad ab harum quidem possimus ab.</p><p>Quos est et ratione vel saepe. Corporis minima ut enim animi qui rerum autem. Voluptatum quia ab eum repellat.</p><p>Necessitatibus vero omnis non enim nostrum. Perspiciatis ex nulla neque dolorem. Deleniti quia et veritatis consequatur enim dolor.</p><p>Aliquid debitis vel sunt velit aut placeat et. Sapiente sint dolores neque unde exercitationem dolor expedita.</p><p>Deserunt ea beatae deleniti. Dolorem quis perferendis molestias reiciendis provident. Architecto autem corrupti maiores veniam nihil iusto.</p><p>Soluta delectus reiciendis excepturi aut dolorum necessitatibus. Sunt sint et autem et. In rerum laboriosam est illum saepe numquam tempore.</p><p>Distinctio est voluptas odio. Facere id excepturi saepe consequatur nobis quae sunt. Aut atque odio culpa aut neque eius.</p><p>Voluptatum fuga et est aut quidem ad. Id iste aut veniam est. Excepturi id tempora nesciunt dolor explicabo nobis. Hic et culpa veritatis dolor laboriosam.</p>', 1, 1, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-22 23:03:12'),
(8, 2, 2, 'Quos voluptas numquam nemo eligendi libero.', 'et-molestiae-est-possimus-quam-expedita', NULL, 'Et atque necessitatibus reprehenderit quia non qui omnis dolores laborum nisi minima ut beatae.', '<p>Illum itaque optio corrupti dignissimos corporis qui. Facere quo harum cupiditate aspernatur. Cumque error sapiente quae ea nostrum.</p><p>Saepe ratione id sapiente deleniti porro quia. Dolorem tenetur ut labore voluptatem earum eum.</p><p>Deleniti qui quis ut sit quasi cupiditate rerum. Earum illum aut eum delectus soluta incidunt id libero. Sunt voluptas libero qui. Cumque aut itaque corrupti distinctio veniam.</p><p>Assumenda est ipsam eum adipisci qui ut numquam. Aut et sit et mollitia similique dolor. Fugiat provident nam asperiores ut maiores non. Est unde tempore ea sequi similique omnis velit.</p><p>Maiores non minus facere aut voluptas porro. Atque deserunt eum dolore reprehenderit. Atque adipisci illum veniam corporis impedit amet.</p><p>Exercitationem tempore ipsum est modi in beatae aperiam. Cupiditate veniam aut nulla quae possimus dolores voluptates. Sequi ex similique et quasi. Aperiam quos facere sint ipsam eveniet totam quaerat.</p>', 1, 1, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-22 23:03:12'),
(9, 1, 1, 'Dolor optio.', 'sit-quod-aperiam-ad-est', NULL, 'Et alias labore ullam deleniti tempore occaecati autem impedit soluta numquam possimus nobis totam illo dignissimos quis quo tenetur possimus.', '<p>Ut illo sint debitis quo cum. Doloribus quaerat et voluptate occaecati. Voluptate officia repellat ducimus porro. Illum molestiae laborum est minus maiores hic aliquid.</p><p>Dolorem perspiciatis tenetur quo expedita rerum minima minima. Et dolore non explicabo distinctio impedit maiores harum. Et quis et nesciunt dolores harum et aperiam.</p><p>Fuga dolor unde est aut. Inventore cum autem repellendus quo dolorum. Similique ut beatae magni dolorem autem saepe id.</p><p>Aspernatur aut voluptatem atque alias. Adipisci ratione ducimus eius vel.</p><p>Saepe ducimus libero natus. Est vitae consequatur rem ut et sed. Ut magnam occaecati iusto aut corrupti impedit. Blanditiis ut sed id ipsam qui quibusdam.</p><p>Eveniet dolorum odit quas esse ut quia eius. Est dolore aut ea aliquam. Hic ea atque unde qui doloribus.</p><p>Placeat sit perspiciatis sunt voluptatibus aut quae. Voluptatibus laudantium ut ut sit. Reprehenderit qui odio earum quia eos qui officiis aut. Numquam dolor voluptatem magni.</p>', 1, 1, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-22 23:03:12'),
(10, 1, 2, 'Iste qui et quis qui autem voluptatibus veniam excepturi.', 'veniam-at-impedit-alias-qui-natus', NULL, 'Ipsam aliquam et voluptatem voluptas praesentium veniam inventore praesentium enim sit natus eos vitae aut nam totam et necessitatibus quos atque incidunt fugit itaque ducimus consequatur sapiente.', '<p>Delectus numquam tempore omnis enim. Unde qui voluptatem error iusto eaque eos tempore suscipit. Soluta ad ea odit est.</p><p>Voluptatem beatae omnis aut recusandae. Provident eum velit rerum vel. Nostrum neque beatae sint autem iste. Qui corporis maxime omnis in facere.</p><p>Et quo numquam molestiae. Velit vitae ad et ut. Iste rem sunt magni ullam quia et. Et animi repellendus blanditiis dolorum qui ut molestias.</p><p>Consequatur reiciendis veritatis sit deserunt. Corporis aliquid rerum voluptatem recusandae. Quis et blanditiis aliquam. Aut perferendis numquam velit quo.</p><p>Ipsa in ut dolor. Alias id id dicta qui dolores. Illo minus quis omnis vel velit qui.</p><p>Dolorem unde quibusdam et culpa ut. Ratione vero quia et in et molestiae libero. Expedita magnam magnam facilis sint recusandae dolor ut. Eveniet et distinctio laudantium voluptatem eius ex ipsum.</p><p>Dolorem sapiente qui quod aliquam molestiae dolore dolor. Quibusdam laboriosam nobis placeat hic qui nesciunt nostrum. Et facere saepe doloribus asperiores dolores. Non et aliquid repellendus qui minus doloremque voluptatem. Autem quis dolorum in voluptatibus quis.</p><p>Blanditiis reiciendis magni ut aliquid quam et ullam laboriosam. Sint enim ad minus consequuntur et voluptatem ea. Sed eos molestiae deserunt accusamus.</p>', 1, 1, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-22 23:03:12'),
(11, 2, 2, 'Molestiae in praesentium quasi et eaque hic labore.', 'nostrum-labore-quaerat-commodi', NULL, 'Placeat quis quia ea libero maiores facere exercitationem aliquid molestiae velit unde sed commodi quidem vitae facilis ut culpa natus quis quo vitae nobis eum dolor facere aliquam.', '<p>Dignissimos ad omnis eum dignissimos voluptatem et assumenda. Non aut nisi fugiat laboriosam sed totam earum. Nam odio ut eaque repellat fugit ipsum et. Quo sint consectetur voluptate mollitia.</p><p>Distinctio sed ducimus facere dolores. Voluptatum hic provident tenetur non at. Maxime non tempora alias ducimus debitis totam ut.</p><p>Et perferendis et veritatis eligendi nesciunt et reprehenderit. Ex pariatur quo culpa illo dolor qui maiores. Eaque molestias et omnis ipsa. Dolor rerum sapiente odit et dolor eum vitae.</p><p>Laborum non omnis reiciendis aperiam et. Voluptatum quae quod totam ipsum. Quia eum in exercitationem nostrum. Autem odit ea odio et est.</p><p>Est velit totam minima dignissimos. Deserunt dignissimos dolorem placeat repellat consequuntur voluptatibus ut.</p>', 1, 1, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-22 23:03:12'),
(12, 1, 1, 'Ab facilis excepturi quos est.', 'ea-nemo-doloribus-eveniet-nam', NULL, 'Suscipit deleniti numquam rem rerum alias quisquam quidem voluptatem vitae assumenda vero veritatis autem fugit necessitatibus nostrum consequatur ut voluptatem quia dignissimos magnam nihil facilis.', '<p>Et sit aut blanditiis magni doloremque. Quidem ut sit iure possimus. Reprehenderit quasi pariatur vel assumenda delectus ut.</p><p>Sapiente molestias quia in sint consequatur aliquam accusantium. Saepe autem expedita quia. Maiores excepturi quisquam accusantium dolorem qui dolorum. Soluta et possimus corporis sit nam sapiente consequatur.</p><p>Cumque officia consequuntur qui id quisquam mollitia. Consectetur est iste praesentium quia sit optio ipsam. Assumenda velit et doloribus dicta velit quis beatae et. Aut quam quia omnis facilis.</p><p>Dolor qui sed ratione temporibus expedita. Eos veniam et sint iusto illum porro. Sed voluptatem omnis veritatis eveniet blanditiis.</p><p>Dolor sit ut voluptate velit ea magnam. Vel assumenda quae fugit ut. Aut odit aut placeat nihil reprehenderit. Rerum eum sequi dolorem eos at alias.</p>', 1, 1, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-22 23:03:12'),
(13, 2, 2, 'Numquam debitis qui nihil temporibus dolores et.', 'rem-quas-commodi-ut-et-id', NULL, 'Nihil similique exercitationem quaerat ratione cumque assumenda aut consequatur sed quae aut esse illo blanditiis adipisci.', '<p>Placeat voluptate doloremque modi. Sunt quaerat cumque recusandae necessitatibus. Nulla et voluptas est voluptate ipsam nihil voluptatem. Illo magni quaerat qui voluptatem.</p><p>Et fugiat perspiciatis mollitia dolores. Facere praesentium et quisquam consequatur. Quo tempore quas molestias. Quisquam laudantium eligendi eos quidem consequatur.</p><p>Et dolorem ut et doloremque consequuntur aperiam. Sit aut accusamus quibusdam nihil. Eos illum sint illo non.</p><p>Qui enim placeat est. Non sunt fugit perferendis sed accusamus voluptatibus. Quis perspiciatis odio ut perferendis.</p><p>Debitis sequi ipsa qui sunt accusamus. Reprehenderit iusto vel et est. Aut voluptate est ipsam deserunt. Sit est et cupiditate accusantium blanditiis dolor ullam. Aliquid eaque quidem est temporibus temporibus.</p><p>Voluptas ab nobis qui similique accusantium illo. Qui qui delectus exercitationem facilis repellat cupiditate aut. Laboriosam architecto rem odio temporibus deleniti sunt ratione. Sed magni nihil qui eum.</p>', 1, 1, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-22 23:03:12'),
(14, 1, 1, 'Autem voluptatibus aliquam eligendi.', 'enim-aliquid-ut-rem-molestias-excepturi-impedit-unde', NULL, 'Voluptatem beatae nobis eligendi ea dolores ad quia perferendis voluptas dolores ut in pariatur et laborum officiis veritatis rerum voluptatibus cupiditate vel veniam.', '<p>Maxime consequatur omnis quasi enim sint non. Quod rerum voluptas voluptas numquam unde. Dolore voluptate dolores voluptatem cupiditate accusamus. Explicabo dolor ratione distinctio consequuntur facilis libero. Vero consectetur dolorum nostrum quo magnam consequuntur.</p><p>Earum eum quidem et aut. Nihil nemo est recusandae distinctio accusamus. Quia numquam rem itaque quia praesentium deserunt earum.</p><p>Accusamus eum repudiandae cupiditate quae et voluptatibus dolor excepturi. Enim saepe molestiae minima voluptas. Non et dicta et modi voluptatibus.</p><p>Necessitatibus perferendis tempore voluptatem vitae atque dignissimos eligendi tempore. Hic itaque recusandae sint ullam vitae libero. Omnis officiis perspiciatis fugit quis eaque.</p><p>Sed aut numquam atque minus vitae. Tempore mollitia quia fugiat et ducimus sunt inventore. Tenetur sapiente dolor velit beatae. Suscipit recusandae ratione repellat.</p><p>Dolorem architecto eaque ut cumque eos eos. Cum soluta fugiat tenetur. Et quis omnis et impedit excepturi asperiores facere.</p><p>Molestiae eius reiciendis repudiandae iusto. Temporibus et nisi maxime eaque architecto. Culpa est suscipit ut nemo et. Enim dolor illo sapiente est consequatur et cumque.</p><p>Reiciendis natus rerum fugiat mollitia aut vero nisi. Nobis ut nihil veniam quia. Aut ducimus non rerum esse adipisci ut. Ut id consequatur et fuga modi.</p><p>Nihil in molestias quo omnis et. Et voluptates totam ducimus autem.</p>', 1, 1, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-22 23:03:12'),
(15, 2, 2, 'Eum dolor possimus autem nihil sunt.', 'in-fugit-odio-perferendis-autem-est-dolorum', NULL, 'Inventore eos non rem voluptatum aperiam sed libero autem similique in corporis quia eum magnam aut ipsa saepe eum laborum odio culpa quasi occaecati voluptas dolorem.', '<p>Placeat adipisci nihil eligendi magnam. Distinctio a et reprehenderit voluptatem. Ipsa voluptatem aut nihil atque maiores labore dicta maxime. Facilis ducimus eos accusantium nemo sunt facere aut necessitatibus.</p><p>Id consectetur molestiae officia ad error est. Voluptatem ab aperiam et at aut ullam ut.</p><p>Id molestiae et cumque. Recusandae ipsum quo perspiciatis dolores sint architecto qui. Nobis fuga quia dolores id eos qui. Dignissimos repellat iure doloribus in explicabo distinctio.</p><p>Blanditiis harum repellat itaque officia error enim in dolor. Eius sapiente aut et qui qui magnam aspernatur. Autem officiis temporibus et natus sed.</p><p>At nihil saepe nulla. At a et voluptates dolores quisquam sit sunt. Hic excepturi aut pariatur aspernatur. Blanditiis tenetur velit ducimus cum repellendus. In illum numquam et dolor maxime voluptatibus voluptatem.</p>', 1, 1, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-22 23:03:12'),
(16, 2, 2, 'Ad corrupti consequatur.', 'omnis-aspernatur-earum-nulla-voluptates-at-doloribus-aliquid', NULL, 'Adipisci ea assumenda iure quia omnis et velit quis inventore laboriosam.', '<p>Sed eum minus voluptas tempora. Est et sed est eos temporibus. Occaecati ut dignissimos incidunt aspernatur explicabo tempora dolores. Unde enim est distinctio.</p><p>Mollitia recusandae animi quas numquam corrupti. Odit nulla ut enim quasi. Non aliquid facere rerum sapiente. Laudantium eum officia voluptas quos.</p><p>Atque quia repellat voluptas illum. Exercitationem aut et autem natus modi. Et iure tempora dolores non. In eos id et et sint ducimus sunt. Veniam ex praesentium ratione aspernatur placeat sed unde.</p><p>Et quas pariatur iste ducimus et consequuntur. Quas voluptatem dolorem non eveniet quasi dolorem sunt. Consequatur aut rerum qui exercitationem quisquam.</p><p>Nam id et optio atque qui corrupti. Deserunt neque qui omnis dolores minus. Explicabo praesentium voluptatem est nisi sunt est et impedit.</p><p>Ducimus autem quia beatae eum harum molestiae autem voluptatem. Fuga doloremque dolores adipisci consectetur magni rerum. Ullam et in ducimus et animi amet.</p><p>Odio sequi quam excepturi omnis sit est quisquam vero. Maiores non et commodi tempore. Repellat neque eius rerum. Odit autem veritatis a nihil quibusdam illum iusto sed.</p>', 1, 1, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-22 23:03:12'),
(17, 2, 1, 'Dicta saepe officiis ut aliquam quos ad consequatur et.', 'autem-ab-mollitia-necessitatibus-esse-illum-velit-velit-ipsa', NULL, 'Corporis sit autem deleniti consectetur eligendi cumque id sunt autem aut dolor.', '<p>Impedit ad ut nobis est nostrum. Eveniet odit rerum quia repellat dolore. Sint sequi ratione enim iste quia rerum.</p><p>Totam est eum enim quia quia libero minima autem. Magnam molestiae officia optio recusandae nam inventore. Ducimus aliquam dolorum qui ea commodi. Error velit perspiciatis ipsum perferendis quis dolor.</p><p>Aut qui maxime culpa est pariatur ut nihil. Cupiditate atque distinctio quibusdam consectetur ducimus. Ab reprehenderit consequatur soluta doloribus omnis consequatur.</p><p>Eum eum reprehenderit sunt rerum repellendus excepturi exercitationem. Animi debitis voluptates sint iure. Quis facere atque rem enim sunt quia quasi. Velit deleniti et reiciendis dolores.</p><p>Nobis quae odio reiciendis saepe et dolorum fugit. At nobis nisi illum atque. Eligendi sit velit odit itaque laborum.</p><p>Repellat vel soluta veritatis sapiente ab. Porro facere deserunt amet eum. Fugiat sunt amet aspernatur explicabo.</p><p>Tempore sunt laboriosam quis error ipsa autem ex. Ducimus adipisci unde repellendus velit veniam ad minus. Voluptate voluptatibus provident sed dolorem.</p>', 1, 1, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-22 23:03:12'),
(18, 1, 2, 'Eius rerum excepturi optio ea est.', 'earum-omnis-quo-consequuntur-maxime-nobis-maxime-quia', NULL, 'Excepturi vel atque aut eos culpa necessitatibus est aut facilis in est quia.', '<p>Facilis ratione est nulla quidem in voluptatem. Sapiente et veritatis et officiis laborum distinctio animi. Sit minima qui odio totam. Ut nam reprehenderit saepe quam qui possimus consequuntur.</p><p>Error occaecati quaerat vero voluptas aperiam voluptatibus veritatis est. Nostrum officiis consequatur numquam. Sequi suscipit expedita unde ratione ut. Libero vero libero dolor ratione animi quasi quo.</p><p>Ab eos porro et et impedit sed et. Quidem quibusdam delectus nesciunt maiores. Consequatur vero rerum error sequi dolores maiores omnis. Nam ab consectetur est iste.</p><p>Officiis in fugit error quam tenetur in sequi. Consequuntur adipisci blanditiis et. Ut magni porro optio id omnis aut molestiae.</p><p>Totam et nesciunt expedita. Suscipit laboriosam magni quos voluptatibus quo ex et.</p><p>Id possimus nihil necessitatibus officiis architecto est quaerat dolorum. Earum ipsam facere dolorem itaque. Dolor porro aut quo sed maxime porro. Nostrum quae culpa consectetur porro dolorem aliquam qui.</p><p>Dolore voluptas doloribus et quibusdam. Sit commodi aut unde. Praesentium voluptas iure unde ab doloremque ullam. Nemo et assumenda cupiditate.</p><p>Dicta quia eligendi sunt tempora deleniti explicabo. Unde quae corporis iste recusandae reprehenderit sit alias. Expedita porro nostrum optio alias repudiandae impedit. Ducimus velit sapiente deleniti fugiat maiores. Eaque rerum fugiat earum modi adipisci.</p>', 1, 1, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-22 23:03:12'),
(19, 1, 1, 'Neque ut quod sunt expedita sit et veritatis.', 'consectetur-laudantium-ut-inventore-fuga-ipsum', NULL, 'Ipsum neque nihil iste sunt aliquid quis molestias nihil et incidunt rerum est eius eaque.', '<p>Voluptas voluptatem dolore voluptatem. Dignissimos qui inventore iste possimus quam at. Assumenda nam officiis a fuga. Quod officia ab aspernatur repudiandae aut mollitia.</p><p>Magnam aperiam veritatis repellendus amet optio excepturi alias. Ut neque ipsum sed sed. Culpa nisi saepe sit est repudiandae.</p><p>Sit autem placeat nihil aut est qui. Sequi sunt iste asperiores dolor. Totam recusandae atque libero id. Aut voluptatum aspernatur officiis cupiditate nostrum voluptatibus.</p><p>Porro excepturi odio voluptatem dolores tempora asperiores. Sunt fugiat facilis exercitationem quae aliquam ea. Perferendis et ab quis ab.</p><p>Impedit harum quo non consequatur sed. Placeat ea incidunt quo quia. Est ipsam expedita omnis nulla quis maxime.</p>', 1, 1, '2022-03-22 17:00:00', '2022-03-22 23:03:12', '2022-03-22 23:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-03-22 23:03:10', '2022-03-22 23:03:10'),
(2, 'author', 'web', '2022-03-22 23:03:10', '2022-03-22 23:03:10'),
(3, 'subscriber', 'web', '2022-03-22 23:03:10', '2022-03-22 23:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Firman Hidayat', 'mimangeditedit', 'fhidayat131@gmail.com', 'user-images/hB9eM6RCIMkRxxcLEleIpbyCuV4IqAwy7nPIk1rK.jpg', NULL, '$2y$10$JSYLadE2IG6ipLAEI/Ir0O5Z0z1ghs6yt0RsKY7BH.Cr3vR9BCLAG', NULL, '2022-03-22 23:03:11', '2022-03-25 04:01:27'),
(2, 'Bentaeee', 'bentaeee', 'bentaeee@gmail.com', NULL, NULL, '$2y$10$8BidMyWwBOqmXb02jSrv0O1vqwEpU5sNl8LW7JLEZntWRAY0aXh0e', NULL, '2022-03-22 23:03:11', '2022-03-22 23:03:11'),
(3, 'Bilhuda', 'bilhuda', 'bilhuda@gmail.com', NULL, NULL, '$2y$10$iqFV8dQi6t2ajxyARM6DHebuu5r8..gEdENkB3JcxNFC0bxGp46JC', NULL, '2022-03-22 23:03:11', '2022-03-22 23:03:11'),
(4, 'Tia', 'tia', 'tia@gmail.com', NULL, NULL, '$2y$10$f/VyOskUFrbon0dXhUYGuuhZ8qxczg0JHWpJ.q9ZRigedGHDz.IcK', NULL, '2022-03-23 19:20:58', '2022-03-23 19:20:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
