import { useEffect, useState } from 'react';
import { View, ActivityIndicator } from 'react-native';
import { useRouter, useRootNavigationState, usePathname } from 'expo-router';
import AsyncStorage from '@react-native-async-storage/async-storage';

export default function Index() {
  const router = useRouter();
  const pathname = usePathname();
  const rootNavigationState = useRootNavigationState();
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const checkLogin = async () => {
      const userData = await AsyncStorage.getItem('user');
      const user = JSON.parse(userData || '{}');
      console.log('Usuario:', user);
      console.log('Path actual:', pathname);

      if (!user.id && pathname !== '/(auth)/login') {
        router.replace('/(auth)/login');
      }
      else if (user.id && pathname !== '/(tabs)') {
        if (user.roles && user.roles.includes('admin')) {
          await AsyncStorage.setItem('isAdmin', 'true');
        } else {
          await AsyncStorage.removeItem('isAdmin');
        }
        router.replace('/(tabs)');
      }

      setLoading(false);
    };

    if (rootNavigationState?.key) {
      checkLogin();
    }
  }, [rootNavigationState]);

  if (loading) {
    return (
      <View style={{ flex: 1, justifyContent: 'center', alignItems: 'center' }}>
        <ActivityIndicator size="large" />
      </View>
    );
  }

  return null;
}
