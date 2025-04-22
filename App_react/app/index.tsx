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
      const user = await AsyncStorage.getItem('user');
      console.log('🔐 Usuario:', user);
      console.log('📍 Path actual:', pathname);

      if (user && pathname !== '/(tabs)') {
        router.replace('/(tabs)');
      } else if (!user && pathname !== '/(auth)/login') {
        router.replace('/(auth)/login');
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
